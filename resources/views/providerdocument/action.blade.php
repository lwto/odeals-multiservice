
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['providerdocument.destroy', $provider_document->id], 'method' => 'delete','data--submit'=>'providerdocument'.$provider_document->id]) }}
<div class="d-flex justify-content-end align-items-center">
    @if(!$provider_document->trashed())
        @if($auth_user->can('providerdocument edit'))
        <a class="mr-2" href="{{ route('providerdocument.create',['id' => $provider_document->id]) }}" title="{{ __('messages.update_form_title',['form' => __('messages.providerdocument') ]) }}"><i class="fas fa-pen text-secondary"></i></a>
        @endif

        @if($auth_user->can('providerdocument delete'))
        <a class="mr-2" href="javascript:void(0)" data--submit="providerdocument{{$provider_document->id}}" 
            data--confirmation='true' data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.providerdocument') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.providerdocument') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            <i class="far fa-trash-alt text-danger"></i>
        </a>
        @endif
    @endif
    @if(auth()->user()->hasAnyRole(['admin']) && $provider_document->trashed())
        <a href="{{ route('providerdocument.action',['id' => $provider_document->id, 'type' => 'restore']) }}"
            title="{{ __('messages.restore_form_title',['form' => __('messages.providerdocument') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.restore_form_title',['form'=>  __('messages.providerdocument') ]) }}"
            data-message='{{ __("messages.restore_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="fas fa-redo text-secondary"></i>
        </a>
        <a href="{{ route('document.action',['id' => $provider_document->id, 'type' => 'forcedelete']) }}"
            title="{{ __('messages.forcedelete_form_title',['form' => __('messages.providerdocument') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.forcedelete_form_title',['form'=>  __('messages.providerdocument') ]) }}"
            data-message='{{ __("messages.forcedelete_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    @endif
{{ Form::close() }}