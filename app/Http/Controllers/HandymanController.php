<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\BookingHandymanMapping;
use App\DataTables\HandymanDataTable;
use App\DataTables\ServiceDataTable;
use App\Http\Requests\UserRequest;

class HandymanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HandymanDataTable $dataTable, Request $request)
    {
        $pageTitle = __('messages.list_form_title',['form' => __('messages.handyman')] );
        if(!empty($request->status)){
            $pageTitle = __('messages.pending_list_form_title',['form' => __('messages.handyman')] );
        }
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable
                ->with('list_status',$request->status)
                ->render('handyman.index', compact('pageTitle','auth_user','assets'));
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

        $handymandata = User::find($id);
        $pageTitle = __('messages.update_form_title',['form'=> __('messages.handyman')]);
        
        if($handymandata == null){
            $pageTitle = __('messages.add_button_form',['form' => __('messages.handyman')]);
            $handymandata = new User;
        }
        
        return view('handyman.create', compact('pageTitle' ,'handymandata' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();
        if(auth()->user()->hasAnyRole(['provider'])){
            $auth_user = authSession();
            $user_id = $auth_user->id;
            $data['provider_id'] = $user_id;
        }
        if($request->id == null && default_earning_type() === 'subscription'){
            $exceed =  get_provider_plan_limit($data['provider_id'],'handyman');
            if(!empty($exceed)){
                if($exceed == 1){
                    $message = __('messages.limit_exceed',['name'=>__('messages.handyman')]);
                }else{
                    $message = __('messages.not_in_plan',['name'=>__('messages.handyman')]);
                }
                if($request->is('api/*')){
                    return comman_message_response($message);
                }else{
                    return  redirect()->back()->withErrors($message);
                }
            }
         }
        $id = $data['id'];

        $data['user_type'] = $data['user_type'] ?? 'handyman';
        $data['is_featured'] = 0;
        
        if($request->has('is_featured')){
			$data['is_featured'] = 1;
		}

        $data['display_name'] = $data['first_name']." ".$data['last_name'];
        // Save User data...
        if($id == null){
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
        }else{
            $user = User::findOrFail($id);
            // User data...
            // $user->removeRole($user->user_type);
            $user->fill($data)->update();
        }
        if($data['status'] == 1 && auth()->user()->hasAnyRole(['admin'])){
            \Mail::send('verification.verification_email',
            array(), function($message) use ($user)
            {
                $message->from(env('MAIL_FROM_ADDRESS'));
                $message->to($user->email);
            });
        }
        $user->assignRole($data['user_type']);
        storeMediaFile($user,$request->profile_image, 'profile_image');
        $message = __('messages.update_form',[ 'form' => __('messages.handyman') ] );
		if($user->wasRecentlyCreated){
			$message = __('messages.save_form',[ 'form' => __('messages.handyman') ] );
		}

        if($request->is('api/*')) {
            return comman_message_response($message);
		}

		return redirect(route('handyman.index'))->withSuccess($message);
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
        $handyman = User::find($id);
        $msg = __('messages.msg_fail_to_delete',['item' => __('messages.handyman')] );
        
        if($handyman!='') { 
            $handyman->delete();
            $msg = __('messages.msg_deleted',['name' => __('messages.handyman')] );
        }
        if(request()->is('api/*')){
            return comman_message_response($msg);
		}
        return redirect()->back()->withSuccess($msg);
    }
    public function action(Request $request){
        $id = $request->id;

        $user  = User::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.handyman')] );
        if($request->type == 'restore') {
            $user->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.handyman')] );
        }
        if($request->type === 'forcedelete'){
            $user->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.handyman')] );
        }
        if(request()->is('api/*')){
            return comman_message_response($msg);
		}
        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }
}
