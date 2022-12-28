
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['handyman.destroy', $handyman->id], 'method' => 'delete','data--submit'=>'handyman'.$handyman->id]) }}
<div class="d-flex justify-content-end align-items-center">
    @if(!$handyman->trashed())
        @if($auth_user->can('handyman edit'))
        <a class="mr-2" href="{{ route('handyman.create',['id' => $handyman->id]) }}" title="{{ __('messages.update_form_title',['form' => __('messages.handyman') ]) }}"><i class="fas fa-pen text-secondary"></i></a>
        @endif

        @if($auth_user->can('handyman delete'))
        <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="handyman{{$handyman->id}}" 
            data--confirmation='true' data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.handyman') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.handyman') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            <i class="far fa-trash-alt"></i>
        </a>
        @endif
    @endif
    @if(auth()->user()->hasAnyRole(['admin']) && $handyman->trashed())
        <a href="{{ route('handyman.action',['id' => $handyman->id, 'type' => 'restore']) }}"
            title="{{ __('messages.restore_form_title',['form' => __('messages.handyman') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.restore_form_title',['form'=>  __('messages.handyman') ]) }}"
            data-message='{{ __("messages.restore_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="fas fa-redo text-secondary"></i>
        </a>
        <a href="{{ route('handyman.action',['id' => $handyman->id, 'type' => 'forcedelete']) }}"
            title="{{ __('messages.forcedelete_form_title',['form' => __('messages.handyman') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.forcedelete_form_title',['form'=>  __('messages.handyman') ]) }}"
            data-message='{{ __("messages.forcedelete_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    @endif
</div>
{{ Form::close() }}