
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['provideraddress.destroy', $provideraddress->id], 'method' => 'delete','data--submit'=>'providertype'.$provideraddress->id]) }}
<div class="d-flex justify-content-end align-items-center">
    @if($auth_user->can('provideraddress edit'))
    <a class="mr-2" href="{{ route('provideraddress.create',['id' => $provideraddress->id]) }}" title="{{ __('messages.update_form_title',['form' => __('messages.provider_address') ]) }}"><i class="fas fa-pen text-secondary"></i></a>
    @endif
    @if($auth_user->can('provideraddress delete'))
    <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="providertype{{$provideraddress->id}}" 
        data--confirmation='true' data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.provider_address') ]) }}"
        title="{{ __('messages.delete_form_title',['form'=>  __('messages.address') ]) }}"
        data-message='{{ __("messages.delete_msg") }}'>
        <i class="far fa-trash-alt"></i>
    </a>
    @endif
</div>
{{ Form::close() }}