<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\WalletHistory;
use App\DataTables\WalletDataTable;
use App\Http\Requests\WalletRequest;
use App\DataTables\WalletHistoryDataTable;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WalletDataTable $dataTable)
    {
        $pageTitle = __('messages.list_form_title',['form' => __('messages.wallet')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('wallet.index', compact('pageTitle','auth_user','assets'));
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

        $wallet = Wallet::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.wallet')]);
        
        if($wallet == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.wallet')]);
            $wallet = new Wallet;
        }
        
        return view('wallet.create', compact('pageTitle' ,'wallet' ,'auth_user' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WalletRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();

        $wallet = Wallet::where('user_id',$data['user_id'])->first();
        if($wallet && !$data['id']){
            $message = __('messages.already_wallet');
            return redirect()->back()->withError($message);
        }
        $result = Wallet::updateOrCreate(['id' => $data['id'] ],$data);

       
        $message = trans('messages.update_form',['form' => trans('messages.wallet')]);
        if($result->wasRecentlyCreated){
            $activity_data = [
                'activity_type' => 'add_wallet',
                'wallet' => $result,
            ];
    
            saveWalletHistory($activity_data);
            $message = trans('messages.save_form',['form' => trans('messages.wallet')]);
        }else{
            if($wallet->amount  != $data['amount']){
                $activity_data = [
                    'activity_type' => 'update_wallet',
                    'wallet' => $result,
                ];
                saveWalletHistory($activity_data);
            }
        }

        return redirect(route('wallet.index'))->withSuccess($message); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,WalletHistoryDataTable $dataTable)
    {
        $pageTitle = __('messages.list_form_title',['form' => __('messages.wallet_history')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->with('id', $id)->render('wallet.view', compact('pageTitle','auth_user','assets','id'));
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
        $wallet = Wallet::find($id);
        $msg= __('messages.msg_fail_to_delete',['item' => __('messages.wallet')] );
        
        if($wallet != '') { 
            $wallet->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.wallet  ')] );
        }

        return redirect()->back()->withSuccess($msg);
    }
}
