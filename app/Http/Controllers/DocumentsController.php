<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
use App\Models\Service;
use App\DataTables\DocumentDataTable;
use App\Http\Requests\DocumentRequest;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DocumentDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.document')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('document.index', compact('pageTitle','auth_user','assets'));
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

        $documentdata = Documents::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.document')]);
        
        if( $documentdata == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.document')]);
             $documentdata = new Documents;
        }
        
        return view('document.create', compact('pageTitle' ,'documentdata' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();

        if(!$request->is('api/*')) {
            $data['is_required'] = 0;
            if($request->has('is_required')){
                $data['is_required'] = 1;
            }
        }
        $result = Documents::updateOrCreate(['id' => $data['id'] ],$data);

        $message = trans('messages.update_form',['form' => trans('messages.document')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.document')]);
        }
        if($request->is('api/*')) {
            return comman_message_response($message);
		}
        return redirect(route('document.index'))->withSuccess($message);        
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
        $document = Documents::find($id);
        $msg= __('messages.msg_fail_to_delete',['name' => __('messages.document')] );
        
        if( $document!='') { 
        
            $document->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.document')] );
        }
        if(request()->is('api/*')) {
            return comman_message_response($msg);
		}
        return redirect()->back()->withSuccess($msg);
    }

    public function action(Request $request){
        $id = $request->id;

        $document  = Documents::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.document')] );
        if($request->type == 'restore') {
            $document->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.document')] );
        }
        if($request->type === 'forcedelete'){
            $document->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.document')] );
        }
        if($request->is('api/*')) {
            return comman_message_response($msg);
		}
        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
    
}
