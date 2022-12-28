<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use App\Models\User;
use App\Models\BookingRating;
use App\Models\CouponServiceMapping;
use App\Models\ProviderServiceAddressMapping;
use App\DataTables\ServiceDataTable;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceDataTable $dataTable)
    {
        $pageTitle = __('messages.list_form_title',['form' => __('messages.service')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('service.index', compact('pageTitle','auth_user','assets'));
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

        $servicedata = Service::find($id);
        
        $pageTitle = __('messages.update_form_title',['form'=> __('messages.service')]);
        
        if($servicedata == null){
            $pageTitle = __('messages.add_button_form',['form' => __('messages.service')]);
            $servicedata = new Service;
        }
        
        return view('service.create', compact('pageTitle' ,'servicedata' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
       
        $services = $request->all();
        $services['service_type'] = !empty($request->service_type) ? $request->service_type : 'service';
        if(auth()->user()->hasRole('user')){
            $services['service_type'] = 'user_post_service';
        }
        if(!$request->is('api/*')) {
            if($request->id == null ){
                if(!isset($services['service_attachment'])){
                    return  redirect()->back()->withErrors(__('validation.required',['attribute' =>'attachments']));
                }
            }
        }
        if($request->id == null && default_earning_type() === 'subscription'){
           $exceed =  get_provider_plan_limit($services['provider_id'],'service');
           if(!empty($exceed)){
            if($exceed == 1){
                $message = __('messages.limit_exceed',['name'=>__('messages.service')]);
            }else{
                 $message = __('messages.not_in_plan',['name'=>__('messages.service')]);
            }
             if($request->is('api/*')){
                 return comman_message_response($message);
             }else{
                 return  redirect()->back()->withErrors($message);
             }
           }
        }
        if($request->id == null){
            $services['added_by'] =  !empty($request->added_by) ? $request->added_by :auth()->user()->id;
        }
        if(!empty($services['is_featured']) && $services['is_featured'] == 1){
            $exceed =  get_provider_plan_limit($services['provider_id'],'featured_service');
            if(!empty($exceed)){
                if($exceed == 1){
                    $message = __('messages.limit_exceed',['name'=>__('messages.featured_service')]);
                }else{
                        $message = __('messages.not_in_plan',['name'=>__('messages.featured_service')]);
                }
                if($request->is('api/*')){
                    return comman_message_response($message);
                }else{
                    return  redirect()->back()->withErrors($message);
                }
            }
        }
        if(!$request->is('api/*')) {
            $services['is_featured'] = 0;
            $services['is_slot'] = 0;
            if($request->has('is_featured')){
                $services['is_featured'] = 1;
            }
            if($request->has('is_slot')){
                $services['is_slot'] = 1;
            }
        }
        $services['provider_id'] = !empty( $services['provider_id'] ) ?  $services['provider_id']     : auth()->user()->id;
       
        $result = Service::updateOrCreate(['id' => $request->id], $services);

        if($result->providerServiceAddress()->count() > 0)
        {
            $result->providerServiceAddress()->delete();
        }

        if($request->provider_address_id != null) {
            foreach($request->provider_address_id as $address) {
                $provider_service_address = [
                    'service_id'   => $result->id,
                    'provider_address_id'   => $address,
                ];
                $result->providerServiceAddress()->insert($provider_service_address);
            }
        }

        if($request->is('api/*')){
			if($request->has('attachment_count')) {
				for($i = 0 ; $i < $request->attachment_count ; $i++){
					$attachment = "service_attachment_".$i;
					if($request->$attachment != null){
						$file[] = $request->$attachment;
					}
				}
				storeMediaFile($result,$file, 'service_attachment');
			}
		}else{
			storeMediaFile($result,$request->service_attachment, 'service_attachment');
		}

        $message = __('messages.update_form',[ 'form' => __('messages.service') ] );
		if($result->wasRecentlyCreated){
			$message = __('messages.save_form',[ 'form' => __('messages.service') ] );
		}

        if($request->is('api/*')) {
            $response = [
                'message'=>$message,
                'service_id' => $result->id
            ];
            return comman_custom_response($response);
		}
		return redirect(route('service.index'))->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            if(request()->is('api/*')){
                return comman_message_response( __('messages.demo_permission_denied') );
            }
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $service = Service::find($id);
        $msg= __('messages.msg_fail_to_delete',['item' => __('messages.service')] );
        
        if($service!='') {
            $service->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.service')] );
        }
        if(request()->is('api/*')){
            return comman_custom_response(['message'=> $msg , 'status' => true]);
        }
        return redirect()->back()->withSuccess($msg);
    }
    public function action(Request $request){
        $id = $request->id;
        $service = Service::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.service')] );
        if($request->type === 'restore'){
            $service->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.service')] );
        }

        if($request->type === 'forcedelete'){
            $service->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.service')] );
        }

        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }

}
