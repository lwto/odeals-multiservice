<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\CouponServiceMapping;
use App\Models\Service;
use App\DataTables\CouponDataTable;
use App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CouponDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.coupon')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('coupon.index', compact('pageTitle','auth_user','assets'));
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

        $coupondata = Coupon::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.coupon')]);
        
        if($coupondata == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.coupon')]);
            $coupondata = new Coupon;
        }
        
        return view('coupon.create', compact('pageTitle' ,'coupondata' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();

        $data['expire_date'] = isset($request->expire_date) ? date('Y-m-d H:i:s',strtotime($request->expire_date)) : date('Y-m-d H:i:s');
        $result = Coupon::updateOrCreate(['id' => $data['id'] ],$data);

        if($request->type  == ''){
            if(count($data['service_id']) > 0){
                $result->serviceAdded()->delete();
                    if($data['service_id'] != null) {
                        foreach($data['service_id'] as $service) {
                            $service_data = [
                                'coupon_id'   => $result->id,
                                'service_id'  =>  $service
                            ];
                            $result->serviceAdded()->insert($service_data);
                        }
                    }
            }
        }
        $message = trans('messages.update_form',['form' => trans('messages.coupon')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.coupon')]);
        }
        if($request->is('api/*')) {
            return comman_message_response($message);
		}
            
        return redirect(route('coupon.index'))->withSuccess($message);
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
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $coupon = Coupon::find($id);
        
        $msg = __('messages.msg_fail_to_delete',['item' => __('messages.coupon')] );
        
        if($coupon != '') { 

            $coupon->delete();
            $msg = __('messages.msg_deleted',['name' => __('messages.coupon')] );
        }
        if(request()->is('api/*')) {
            return comman_message_response($msg);
		}
        return redirect(route('coupon.index'))->withSuccess($msg);
    }

    public function action(Request $request)
    {
        $id = $request->id;
        
        $coupon = Coupon::withTrashed()->where('id',$id)->first();

        $msg = __('messages.not_found_entry',['name' => __('messages.coupon')] );
        if($request->type == 'restore') {
            $coupon->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.coupon')] );
        }
        if($request->type === 'forcedelete'){
            $coupon->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.coupon')] );
        }
        if($request->is('api/*')) {
            return comman_message_response($msg);
		}
        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
}
