<?php

namespace App\Http\Controllers;
use App\DataTables\ServiceFaqDataTable;
use App\Models\ServiceFaq;

use Illuminate\Http\Request;

class ServiceFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceFaqDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.servicefaq')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        $service_id = request()->id;
        return $dataTable->with('id', request()->id)->render('servicefaq.index', compact('pageTitle','auth_user','assets','service_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $service_id = $request->service_id;
        $auth_user = authSession();
        $servicefaq = ServiceFaq::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.servicefaq')]);
        
        if($servicefaq == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.servicefaq')]);
            $servicefaq = new ServiceFaq;
        }
        
        return view('servicefaq.create', compact('pageTitle' ,'servicefaq' ,'auth_user','service_id' ));
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
        $result = ServiceFaq::updateOrCreate(['id' => $data['id'] ],$data);
        $message = trans('messages.update_form',['form' => trans('messages.servicefaq')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.servicefaq')]);
        }

        return redirect(route('servicefaq.index',['id'=>$data['service_id']]))->withSuccess($message);   
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
        $servicefaq = ServiceFaq::find($id);
        $msg= __('messages.msg_fail_to_delete',['name' => __('messages.servicefaq')] );
        
        if($servicefaq!='') { 

            $servicefaq->delete();
        
            $msg= __('messages.msg_deleted',['name' => __('messages.servicefaq')] );
        }

        return redirect()->back()->withSuccess($msg);
    }
}