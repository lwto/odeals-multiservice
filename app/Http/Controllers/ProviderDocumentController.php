<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProviderDocument;
use App\Models\Service;
use App\DataTables\ProviderDocumentDataTable;
use App\Http\Requests\ProviderDocumentRequest;

class ProviderDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProviderDocumentDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.providerdocument')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('providerdocument.index', compact('pageTitle','auth_user','assets'));
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

        $provider_document = ProviderDocument::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.providerdocument')]);
        
        if( $provider_document == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.providerdocument')]);
             $provider_document = new ProviderDocument;
        }
        
        return view('providerdocument.create', compact('pageTitle' ,'provider_document' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderDocumentRequest $request)
    {
        if(demoUserPermission()){
            if(request()->is('api/*')){
                return comman_message_response( __('messages.demo_permission_denied') );
            } else {
                return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
            }
        }
        $data = $request->all();
        $data['is_verified'] = !empty($data['is_verified']) ? $data['is_verified']: 0;
        $data['provider_id'] = !empty( $data['provider_id'] ) ?  $data['provider_id'] : auth()->user()->id;
        $result = ProviderDocument::updateOrCreate(['id' => $request->id ],$data);
        storeMediaFile($result,$request->provider_document, 'provider_document');

        $message = __('messages.update_form',['form' => __('messages.providerdocument')]);
        if($result->wasRecentlyCreated){
            $message = __('messages.save_form',['form' => __('messages.providerdocument')]);
        }
        if($request->is('api/*')) {
            return comman_message_response($message);
		}
        return redirect(route('providerdocument.index'))->withSuccess($message);        
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
        $provider_document = ProviderDocument::find($id);
        
        if( $provider_document!='') { 
        
            $provider_document->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.providerdocument')] );
        }
        if(request()->is('api/*')){
            return comman_custom_response(['message'=> $msg , 'status' => true]);
        }
        return redirect()->back()->withSuccess($msg);
    }

    public function action(Request $request){
        $id = $request->id;

        $provider_document  = ProviderDocument::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.providerdocument')] );
        if($request->type == 'restore') {
            $provider_document->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.providerdocument')] );
        }
        if($request->type === 'forcedelete'){
            $provider_document->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.providerdocument')] );
        }
        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
    
}
