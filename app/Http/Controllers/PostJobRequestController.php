<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostJobRequest;
use App\DataTables\PostjobRequestsDataTable;

class PostJobRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostjobRequestsDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.postjob')] );
        $auth_user = authSession();
        $assets = ['datatable'];

        return $dataTable->render('postrequest.index', compact('pageTitle','auth_user','assets'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['customer_id'] =  !empty($request->customer_id) ? $request->customer_id : auth()->user()->id; 

        $result = PostJobRequest::updateOrCreate(['id' => $request->id], $data);

        $activity_data = [
            'activity_type' => 'job_requested',
            'post_job_id' => $result->id,
            'post_job' => $result,
        ];

        saveRequestJobActivity($activity_data);
         if($result->postServiceMapping()->count() > 0)
        {
            $result->postServiceMapping()->delete();
        }

        if($request->service_id != null) {
            foreach($request->service_id as $service) {
                $post_services = [
                    'post_request_id'   => $result->id,
                    'service_id'   => $service,
                ];
                $result->postServiceMapping()->insert($post_services);
            }
        }
        if($request->status == 'accept'){
            $activity_data = [
                'activity_type' => 'user_accept_bid',
                'post_job_id' => $result->id,
                'post_job' => $result,
            ];
    
            saveRequestJobActivity($activity_data);
        }
        $message = __('messages.update_form',[ 'form' => __('messages.postrequest') ] );
		if($result->wasRecentlyCreated){
			$message = __('messages.save_form',[ 'form' => __('messages.postrequest') ] );
		}

        if($request->is('api/*')) {
            return comman_message_response($message);
		}

		return redirect(route('service.index'))->withSuccess($message);
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
        $post_request = PostJobRequest::find($id);
        $msg= __('messages.msg_fail_to_delete',['item' => __('messages.postrequest')] );
        
        if($post_request!='') {
            if($post_request->postServiceMapping()->count() > 0)
            {
                $post_request->postServiceMapping()->delete();
            }
            if($post_request->postBidList()->count() > 0)
            {
                $post_request->postBidList()->delete();
            }
            $post_request->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.postrequest')] );
        }
        if(request()->is('api/*')){
            return comman_custom_response(['message'=> $msg , 'status' => true]);
        }
        return redirect()->back()->withSuccess($msg);
    
    }
}
