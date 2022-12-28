<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Service;
use App\DataTables\SliderDataTable;
use App\Http\Requests\SliderRequest;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SliderDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.slider')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('slider.index', compact('pageTitle','auth_user','assets'));
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

        $sliderdata = Slider::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.slider')]);
        
        if($sliderdata == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.slider')]);
            $sliderdata = new Slider;
        }
        
        return view('slider.create', compact('pageTitle' ,'sliderdata' ,'auth_user' ));
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
        $sliders = $request->all();

		$sliders['id']  = $request->id;

        $result = Slider::updateOrCreate(['id' => $request->id], $sliders);
        
        storeMediaFile($result,$request->slider_image, 'slider_image');

        $message = __('messages.update_form',[ 'form' => __('messages.slider') ] );
		if($result->wasRecentlyCreated){
			$message = __('messages.save_form',[ 'form' => __('messages.slider') ] );
		}

		return redirect(route('slider.index'))->withSuccess($message);
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
        $slider = Slider::find($id);
        $msg = __('messages.msg_fail_to_delete',['item' => __('messages.slider')] );
        
        if($slider!='') {        
            $slider->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.slider')] );
        }

        return redirect()->back()->withSuccess($msg);
    }
    public function action(Request $request){
        $id = $request->id;

        $slider  = Slider::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.slider')] );
        if($request->type == 'restore') {
            $slider->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.slider')] );
        }

        if($request->type === 'forcedelete'){
            $slider->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.slider')] );
        }
        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
}
