<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DataTables\TaxDataTable;
use App\Http\Requests\TaxRequest;
use App\Models\Tax;


class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TaxDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.tax')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('taxes.index', compact('pageTitle','auth_user','assets'));
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

        $taxdata = Tax::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.tax')]);
        
        if($taxdata == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.tax')]);
            $taxdata = new Tax;
        }
        
        return view('taxes.create', compact('pageTitle' ,'taxdata' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();
       
       
        $result = Tax::updateOrCreate(['id' => $data['id'] ],$data);


        $message = trans('messages.update_form',['form' => trans('messages.tax')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.tax')]);
        }

        return redirect(route('tax.index'))->withSuccess($message);        
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
        $tax = Tax::find($id);
        $msg= __('messages.msg_fail_to_delete',['item' => __('messages.tax')] );
        
        if($tax != '') { 
            $tax->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.tax')] );
        }

        return redirect()->back()->withSuccess($msg);
    }
}
