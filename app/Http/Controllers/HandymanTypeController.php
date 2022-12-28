<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HandymanType;
use App\Models\Service;
use App\DataTables\HandymanTypeDataTable;
use App\Http\Requests\HandymanTypeRequest;

class HandymanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HandymanTypeDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.handymantype')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('handymantype.index', compact('pageTitle','auth_user','assets'));
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

        $handymantypedata = HandymanType::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.handymantype')]);
        
        if($handymantypedata == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.handymantype')]);
            $handymantypedata = new HandymanType;
        }
        
        return view('handymantype.create', compact('pageTitle' ,'handymantypedata' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HandymanTypeRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();
       
        $result = HandymanType::updateOrCreate(['id' => $data['id'] ],$data);

        $message = trans('messages.update_form',['form' => trans('messages.handymantype')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.handymantype')]);
        }
        if($request->is('api/*')) {
            return comman_message_response($message);
		}
        return redirect(route('handymantype.index'))->withSuccess($message);        
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
        $handymantype = HandymanType::find($id);
        $msg= __('messages.msg_fail_to_delete',['item' => __('messages.handymantype')] );
        
        if($handymantype != '') { 
            $handymantype->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.handymantype')] );
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

        $handyman_type  = HandymanType::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.handyman')] );
        if($request->type == 'restore') {
            $handyman_type->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.handyman')] );
        }
        if($request->type === 'forcedelete'){
            $handyman_type->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.handyman_type')] );
        }
        if($request->is('api/*')) {
            return comman_message_response($msg);
		}

        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
}
