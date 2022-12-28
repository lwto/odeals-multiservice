
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['wallet.destroy', $wallet->id], 'method' => 'delete','data--submit'=>'wallet'.$wallet->id]) }}
@if(auth()->user()->hasAnyRole(['admin']))
<div class="d-flex justify-content-end align-items-center">
        <a class="mr-2" href="{{ route('wallet.create',['id' => $wallet->id]) }}" title="{{ __('messages.update_form_title',['form' => __('messages.wallet') ]) }}"><i class="fas fa-pen text-secondary"></i></a>
        <a class="" href="{{ route('wallet.show',$wallet->user_id) }}" title="{{ __('messages.view_form_title',['form'=>  __('messages.wallet') ]) }}"><i class="far fa-eye text-secondary mr-2"></i></a>
        <a class="mr-2" href="javascript:void(0)" data--submit="wallet{{$wallet->id}}" 
            data--confirmation='true' data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.wallet') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.wallet') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    </div>
@endif
{{ Form::close() }}