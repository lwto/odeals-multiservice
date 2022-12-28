<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProviderType;
use App\Models\Service;
use App\DataTables\ProviderTypeDataTable;
use App\Http\Requests\ProviderTypeRequest;

class ProviderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProviderTypeDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.providertype')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('providertype.index', compact('pageTitle','auth_user','assets'));
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

        $providertypedata = ProviderType::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.providertype')]);
        
        if($providertypedata == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.providertype')]);
            $providertypedata = new ProviderType;
        }
        
        return view('providertype.create', compact('pageTitle' ,'providertypedata' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderTypeRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();
       
       
        $result = ProviderType::updateOrCreate(['id' => $data['id'] ],$data);

        $message = trans('messages.update_form',['form' => trans('messages.providertype')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.providertype')]);
        }
        if($request->is('api/*')) {
            return comman_message_response($message);
		}
        return redirect(route('providertype.index'))->withSuccess($message);        
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
        $providertype = ProviderType::find($id);
        $msg= __('messages.msg_fail_to_delete',['item' => __('messages.providertype')] );
        
        if($providertype != '') { 
            $providertype->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.providertype')] );
        }
        if(request()->is('api/*')) {
            return comman_message_response($msg);
		}
        return redirect()->back()->withSuccess($msg);
    }
    public function action(Request $request){
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $id = $request->id;

        $provider_type  = ProviderType::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.provider')] );
        if($request->type == 'restore') {
            $provider_type->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.provider')] );
        }
        if($request->type === 'forcedelete'){
            $provider_type->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.provider_type')] );
        }
        if($request->is('api/*')) {
            return comman_message_response($msg);
		}

        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
}
