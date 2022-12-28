<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.category')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('category.index', compact('pageTitle','auth_user','assets'));
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

        $categorydata = Category::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.category')]);
        
        if($categorydata == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.category')]);
            $categorydata = new Category;
        }
        
        return view('category.create', compact('pageTitle' ,'categorydata' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();
       
        $data['is_featured'] = 0;
        if($request->has('is_featured')){
			$data['is_featured'] = 1;
		}
        $result = Category::updateOrCreate(['id' => $data['id'] ],$data);

        storeMediaFile($result,$request->category_image, 'category_image');

        $message = trans('messages.update_form',['form' => trans('messages.category')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.category')]);
        }
        if($request->is('api/*')) {
            return comman_message_response($message);
		}
        return redirect(route('category.index'))->withSuccess($message);        
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
        $category = Category::find($id);
        $msg= __('messages.msg_fail_to_delete',['name' => __('messages.category')] );
        
        if($category!='') { 

            $service = Service::where('category_id',$id)->first();
        
            $category->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.category')] );
        }
        if(request()->is('api/*')) {
            return comman_message_response($msg);
		}
        return redirect()->back()->withSuccess($msg);
    }   
    public function action(Request $request){
        $id = $request->id;

        $category  = Category::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.category')] );
        if($request->type == 'restore') {
            $category->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.category')] );
        }
        if($request->type === 'forcedelete'){
            $category->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.category')] );
        }
        if(request()->is('api/*')){
            return comman_message_response($msg);
		}
        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
    
}
