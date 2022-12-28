<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plans;
use App\Models\PlanLimit;
use App\Models\StaticData;
use App\DataTables\PlanDataTable;
use App\Http\Requests\PlanRequest;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PlanDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.plan')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('plan.index', compact('pageTitle','auth_user','assets'));
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

        $plan = Plans::with('planlimit')->find($id);
        $plan_type = StaticData::where('type','plan_type')->get();
        $plan_limit = StaticData::where('type','plan_limit_type')->get();
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.plan')]);
        
        if($plan == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.plan')]);
            $plan = new Plans;
        }
        
        return view('plan.create', compact('pageTitle' ,'plan' ,'auth_user','plan_type','plan_limit' ));
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
        $requestData = $request->all();
        $plans = Plans::where('title', '=', $requestData['title'])->first();
        if ($plans !== null && $request->id == null) {
            return  redirect()->back()->withErrors(__('validation.unique',['attribute'=>__('messages.plan')]));
        }

        $planData = [
            'title' => $requestData['title'],
            'amount' => $requestData['amount'],
            'status' => $requestData['status'],
            'duration' => $requestData['duration'],
            'description' => $requestData['description'],
            'plan_type' => $requestData['plan_type'],
            'type'=> $requestData['type']
        ];
        if(empty($request->id) && $request->id == null){
            $planData['identifier'] = strtolower($requestData['title']);
        }
        $result = Plans::updateOrCreate(['id' => $requestData['id'] ],$planData);
        if($result){
            if($result->planlimit()->count() > 0)
            {
                $result->planlimit()->delete();
            }
            $limitdata = [
                'plan_id' =>  $result->id,
                'plan_limitation' => $requestData['plan_limitation']
            ];
            PlanLimit::updateOrCreate(['id' => $requestData['id'] ],$limitdata);            
        }
        
        $message = trans('messages.update_form',['form' => trans('messages.plan')]);

        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.plan')]);
        }

        return redirect(route('plans.index'))->withSuccess($message);        
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
        $plan = Plans::find($id);
        $msg= __('messages.msg_fail_to_delete',['item' => __('messages.plan')] );
        
        if($plan!='') {
            if($plan->planlimit()->count() > 0)
            {
                $plan->planlimit()->delete();
            }
            $plan->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.plan')] );
        }
        return redirect()->back()->withSuccess($msg);
    }
}
