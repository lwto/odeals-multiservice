<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\DataTables\SubCategoryDataTable;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.subcategory')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('subcategory.index', compact('pageTitle','auth_user','assets'));
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

        $subcategory = SubCategory::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.subcategory')]);
        
        if($subcategory == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.subcategory')]);
            $subcategory = new SubCategory;
        }
        
        return view('subcategory.create', compact('pageTitle' ,'subcategory' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();
       
        $data['is_featured'] = 0;
        if($request->has('is_featured')){
			$data['is_featured'] = 1;
		}
        $result = SubCategory::updateOrCreate(['id' => $data['id'] ],$data);

        storeMediaFile($result,$request->subcategory_image, 'subcategory_image');

        $message = trans('messages.update_form',['form' => trans('messages.subcategory')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.subcategory')]);
        }
        if($request->is('api/*')) {
            return comman_message_response($message);
		}
        return redirect(route('subcategory.index'))->withSuccess($message);    
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
        $subcategory = SubCategory::find($id);
        $msg= __('messages.msg_fail_to_delete',['name' => __('messages.subcategory')] );
        
        if($subcategory!='') { 
            $subcategory->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.subcategory')] );
        }
        if(request()->is('api/*')) {
            return comman_message_response($msg);
		}
        return redirect()->back()->withSuccess($msg);
    }
    public function action(Request $request){
        $id = $request->id;

        $subcategory  = SubCategory::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.subcategory')] );
        if($request->type == 'restore') {
            $subcategory->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.subcategory')] );
        }
        if($request->type === 'forcedelete'){
            $subcategory->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.subcategory')] );
        }
        if(request()->is('api/*')){
            return comman_message_response($msg);
		}
        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
}
