
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['provider.destroy', $provider->id], 'method' => 'delete','data--submit'=>'provider'.$provider->id]) }}
<div class="d-flex justify-content-end align-items-center">
    @if(!$provider->trashed())
        @if($auth_user->can('provider edit'))
        <a class="mr-2" href="{{ route('provider.create',['id' => $provider->id]) }}" title="{{ __('messages.update_form_title',['form' => __('messages.provider') ]) }}"><i class="fas fa-pen text-secondary"></i></a>
        @endif
        <a class="mr-2" href="{{ route('provider.show',$provider->id) }}"><i class="far fa-eye text-secondary"></i></a>
        @if($auth_user->can('provider delete'))
        <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="provider{{$provider->id}}" 
            data--confirmation='true' data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.provider') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.provider') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            <i class="far fa-trash-alt"></i>
        </a>
        @endif
    @endif
    @if(auth()->user()->hasAnyRole(['admin']) && $provider->trashed())
        <a href="{{ route('provider.action',['id' => $provider->id, 'type' => 'restore']) }}"
            title="{{ __('messages.restore_form_title',['form' => __('messages.provider') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.restore_form_title',['form'=>  __('messages.provider') ]) }}"
            data-message='{{ __("messages.restore_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="fas fa-redo text-secondary"></i>
        </a>
        <a href="{{ route('provider.action',['id' => $provider->id, 'type' => 'forcedelete']) }}"
            title="{{ __('messages.forcedelete_form_title',['form' => __('messages.provider') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.forcedelete_form_title',['form'=>  __('messages.provider') ]) }}"
            data-message='{{ __("messages.forcedelete_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    @endif
</div>
{{ Form::close() }}