<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProviderAddressMapping;
use App\DataTables\ProviderAddressDataTable;


class ProviderAddressMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProviderAddressDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.provider_address')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('provideraddress.index', compact('pageTitle','auth_user','assets'));
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

        $provideraddress = ProviderAddressMapping::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.provider_address')]);
        
        if($provideraddress == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.provider_address')]);
            $provideraddress = new ProviderAddressMapping;
        }
        
        return view('provideraddress.create', compact('pageTitle' ,'provideraddress' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();
        $data['provider_id'] = !empty($data['provider_id']) ? $data['provider_id'] : auth()->user()->id;
        $result = ProviderAddressMapping::updateOrCreate(['id' => $data['id'] ],$data);

        $message = __('messages.update_form',['form' => __('messages.provider_address')]);
        if($result->wasRecentlyCreated){
            $message = __('messages.save_form',['form' => __('messages.provider_address')]);
        }

        if($request->is('api/*')) {
            return comman_message_response($message);
		}

        return redirect(route('provideraddress.index'))->withSuccess($message);   
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
        $provideraddress = ProviderAddressMapping::find($id);
        $msg = __('messages.msg_fail_to_delete',['item' => __('messages.provider_address')] );
        
        if( $provideraddress!='') { 
        
            $provideraddress->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.provider_address')] );
        }
        if(request()->is('api/*')){
            return comman_custom_response(['message'=> $msg , 'status' => true]);
        }
        return redirect()->back()->withSuccess($msg);
    }

    public function action(Request $request){
        $id = $request->id;

        $provideraddress  = ProviderAddressMapping::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.provider_address')] );
        if($request->type == 'restore') {
            $provideraddress->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.provider_address')] );
        }
        if($request->type === 'forcedelete'){
            $provideraddress->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.provider_address')] );
        }
        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
}
