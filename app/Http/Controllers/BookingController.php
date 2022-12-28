<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Service;
use App\Models\Payment;
use App\Models\User;
use App\Models\BookingCouponMapping;
use App\Models\BookingActivity;
use App\Models\BookingStatus;
use App\Models\PostJobRequest;
use App\Models\ProviderAddressMapping;
use App\DataTables\BookingDataTable;
use App\DataTables\ServiceDataTable;
use App\Http\Requests\BookingUpdateRequest;
use App\Models\Notification;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookingDataTable $dataTable)
    {
        $pageTitle = __('messages.list_form_title',['form' => __('messages.booking')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('booking.index', compact('pageTitle','auth_user','assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $auth_user = authSession();

        $bookingdata = Booking::find($id);
        $pageTitle = __('messages.update_form_title',['form'=> __('messages.booking')]);
        
        if($bookingdata == null){
            $pageTitle = __('messages.add_button_form',['form' => __('messages.booking')]);
            $bookingdata = new Booking;
        }
        
        return view('booking.create', compact('pageTitle' ,'bookingdata' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $data = $request->all();
        if($request->id == null)
        {
            $data['status'] = !empty($data['status']) ? $data['status'] :'pending';
        }       
        $data['date'] = isset($request->date) ? date('Y-m-d H:i:s',strtotime($request->date)) : date('Y-m-d H:i:s');
        $service_data = Service::find($data['service_id']);
        $data['provider_id'] = !empty($data['provider_id']) ? $data['provider_id']: $service_data->provider_id;
        if($request->has('tax') && $request->tax != null) {
             $data['tax'] = json_encode($request->tax);
         }
        if($request->coupon_id != null) {
            $coupons = Coupon::with('serviceAdded')->where('code',$request->coupon_id)
                ->where('expire_date','>',date('Y-m-d H:i'))->where('status',1)
                ->whereHas('serviceAdded', function($coupon) use($service_data){
                    $coupon->where('service_id', $service_data->id );
                })->first();
            
            if( $coupons == null ) {
                return comman_message_response( __('messages.invalid_coupon_code'),400);
            } else {
                $data['coupon_id'] = $coupons->id;
            }
        }
        $result = Booking::updateOrCreate(['id' => $request->id], $data);
       
        $activity_data = [
            'activity_type' => 'add_booking',
            'booking_id' => $result->id,
            'booking' => $result,
        ];

        saveBookingActivity($activity_data);

        if($data['coupon_id'] != null) {
            $coupons = Coupon::find($data['coupon_id']);
            
            $coupon_data = [
                'booking_id'    => $result->id,
                'code'          => $coupons->code,
                'discount'      => $coupons->discount,
                'discount_type' => $coupons->discount_type,
            ];
            
            $result->couponAdded()->create($coupon_data);
        }
        if($request->has('booking_address_id') && $request->booking_address_id != null) {
            $booking_address_mapping = ProviderAddressMapping::find($data['booking_address_id']);
            
            $booking_address_data = [
                'booking_id'    => $result->id,
                'address'          => $booking_address_mapping->address,
                'latitude'      => $booking_address_mapping->latitude,
                'longitude' => $booking_address_mapping->longitude,
            ];
            
            $result->addressAdded()->create($booking_address_data);
        }
        if($data['type'] === 'user_post_job'){
            $post_request = PostJobRequest::where('id',$data['post_request_id'])->first();
            $post_request->date = isset($request->date) ? date('Y-m-d H:i:s',strtotime($request->date)) : date('Y-m-d H:i:s');
            $post_request->update();
        }
		if($result->wasRecentlyCreated){
			$message = __('messages.save_form',[ 'form' => __('messages.booking') ] );
		}

        if($request->is('api/*')) {
            $response = [
                'message'=>$message,
                'booking_id' => $result->id
            ];
            return comman_custom_response($response);
		}
		return  redirect(route('booking.index'))->withSuccess($message);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth_user = authSession();

        $bookingdata = Booking::with('bookingExtraCharge')->myBooking()->find($id);
        if(empty($bookingdata))
        {
            $msg = __('messages.not_found_entry',['name' => __('messages.booking')] );
            return redirect(route('booking.index'))->withError($msg);
        }
        if(count($auth_user->unreadNotifications) > 0 ) {
            $auth_user->unreadNotifications->where('data.id',$id)->markAsRead();
        }

        $pageTitle = __('messages.view_form_title',['form'=> __('messages.booking')]);
        return view('booking.view', compact('pageTitle' ,'bookingdata' ,'auth_user' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auth_user = authSession();

        $bookingdata = Booking::myBooking()->find($id);
        $pageTitle = __('messages.update_form_title',['form'=> __('messages.booking')]);
        $relation = [
            'status' => BookingStatus::where('status',1)->orderBy('sequence','ASC')->get()->pluck('label', 'value'),
        ];
        return view('booking.edit', compact('pageTitle' ,'bookingdata' ,'auth_user' )+$relation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingUpdateRequest $request, $id)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();
        
        $data['date'] = isset($request->date) ? date('Y-m-d H:i:s',strtotime($request->date)) : date('Y-m-d H:i:s');
        $data['start_at'] = isset($request->start_at) ? date('Y-m-d H:i:s',strtotime($request->start_at)) : null;
        $data['end_at'] = isset($request->end_at) ? date('Y-m-d H:i:s',strtotime($request->end_at)) : null;

        
        $bookingdata = Booking::find($id);
        $paymentdata = Payment::where('booking_id',$id)->first();
        if($data['status'] === 'hold'){
            if($bookingdata->start_at == null && $bookingdata->end_at == null){
                $duration_diff = duration($data['start_at'] ,$data['end_at'] ,'in_minute');
                $data['duration_diff'] = $duration_diff;
            }else{
                if($bookingdata->status == $data['status']){
                    $booking_start_date = $bookingdata->start_at;
                    $request_start_date = $data['start_at'];
                    if($request_start_date > $booking_start_date){
                        $msg = __('messages.already_in_status',[ 'status' => $data['status'] ] );
                        return redirect()->back()->withSuccess($msg);
                    }
                }else{
                    $duration_diff = $bookingdata->duration_diff;
                    $new_diff = duration($bookingdata->start_at ,$bookingdata->end_at ,'in_minute');
                    $data['duration_diff'] = $duration_diff + $new_diff;
                }
            }
        }
        if($bookingdata->status != $data['status']) {
            $activity_type = 'update_booking_status';
        }
        if($data['status'] == 'cancelled'){
            $activity_type = 'cancel_booking';
        }
        $data['reason'] = isset($data['reason']) ? $data['reason'] : null;
        $old_status = $bookingdata->status;
        $bookingdata->update($data);
        if($old_status != $data['status']){
            $bookingdata->old_status = $old_status;
            $activity_data = [
                'activity_type' => $activity_type,
                'booking_id' => $id,
                'booking' => $bookingdata,
            ];
    
            saveBookingActivity($activity_data);
        }
        if($bookingdata->payment_id != null){
            $data['payment_status'] = isset($data['payment_status']) ? $data['payment_status'] : 'pending';
            $paymentdata->update($data);

            if($bookingdata->payment_id != null){
                $data['payment_status'] = isset($data['payment_status']) ? $data['payment_status'] : 'pending';
                $paymentdata->update($data);
                $activity_data = [
                    'activity_type' => 'payment_message_status',
                    'payment_status'=> $data['payment_status'],
                    'booking_id' => $id,
                    'booking' => $bookingdata,
                ];
                saveBookingActivity($activity_data);
            }
        }
        $message = __('messages.update_form',[ 'form' => __('messages.booking') ] );

        if($request->is('api/*')) {
            return comman_message_response($message);
		}

		return  redirect(route('booking.index'))->withSuccess($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $booking = Booking::find($id);
        $msg = __('messages.msg_fail_to_delete',['item' => __('messages.booking')] );
        
        if($booking != '') {
            Notification::whereJsonContains('data->id',$booking->id)->delete();
            $booking->delete();
            $msg = __('messages.msg_deleted',['name' => __('messages.booking')] );
        }
        
        return redirect()->back()->withSuccess($msg);
    }

    public function  bookingAssignForm(Request $request){

        $bookingdata = Booking::find($request->id);
        $pageTitle = __('messages.assign_form_title',['form'=> __('messages.booking')]);
        return view('booking.assigned_form',compact('bookingdata','pageTitle'));
    }

    public function bookingAssigned(Request $request)
    {
        $bookingdata =  Booking::find($request->id);

        $assigned_handyman_ids = [];
        if($bookingdata->handymanAdded()->count() > 0){
            $assigned_handyman_ids = $bookingdata->handymanAdded()->pluck('handyman_id')->toArray();
            $bookingdata->handymanAdded()->delete();
            $message = __('messages.transfer_to_handyman');
            $activity_type = 'transfer_booking';
        } else {
            $message = __('messages.assigned_to_handyman');
            $activity_type = 'assigned_booking';
        }

        $remove_notification_id = [];
        if($request->handyman_id != null) {
            foreach($request->handyman_id as $handyman) {
                $assign_to_handyman = [
                    'booking_id'   => $bookingdata->id,
                    'handyman_id'  => $handyman
                ];
                $remove_notification_id = removeArrayValue($assigned_handyman_ids,$handyman);
                $bookingdata->handymanAdded()->insert($assign_to_handyman);
            }
        }

        if(!empty($remove_notification_id)){
            $search = "id".'":'.$bookingdata->id;
            
            Notification::whereIn('notifiable_id',$remove_notification_id)
                ->whereJsonContains('data->id',$bookingdata->id)
                ->delete();
        }

        $activity_data = [
            'activity_type' => $activity_type,
            'booking_id' => $bookingdata->id,
            'booking' => $bookingdata,
        ];

        saveBookingActivity($activity_data);
        $message = __('messages.save_form',[ 'form' => __('messages.booking') ] );
        if($request->is('api/*')) {
            return comman_message_response($message);
		}

        return response()->json(['status' => true,'event' => 'callback' , 'message' => $message]);
    }

    public function action(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $booking_data = Booking::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.booking')] );
        if($request->type === 'restore'){
            if($booking_data != ''){
                $booking_data->restore();
                $msg = __('messages.msg_restored',['name' => __('messages.booking')] );
            }
        }
        if($request->type === 'forcedelete'){
            $booking_data->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.booking')] );
        }

        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
}
