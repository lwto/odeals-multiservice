
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['booking.destroy', $booking->id], 'method' => 'delete','data--submit'=>'booking'.$booking->id]) }}
<div class="d-flex justify-content-end align-items-center">
    @if(!$booking->trashed())
        @if($auth_user->can('booking edit'))
        <a href="{{ route('booking.edit',$booking->id) }}" class="mr-2" title="{{ __('messages.update_form_title',['form' => __('messages.booking') ]) }}"><i class="fas fa-pen text-secondary"></i></a>
        @endif

        @if($auth_user->can('booking view'))
        <a class="" href="{{ route('booking.show',$booking->id) }}" title="{{ __('messages.view_form_title',['form'=>  __('messages.booking') ]) }}"><i class="far fa-eye text-secondary mr-2"></i></a>
        @endif
        @if($auth_user->can('booking delete') && !$booking->trashed())
        <a class="" href="javascript:void(0)" data--submit="booking{{$booking->id}}" 
            data--confirmation='true' data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.booking') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.booking') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            <i class="far fa-trash-alt text-danger "></i>
        </a>
        @endif
    @endif
    @if(auth()->user()->hasAnyRole(['admin']) && $booking->trashed())
        <a class="mr-2" href="{{ route('booking.action',['id' => $booking->id, 'type' => 'restore']) }}"
            title="{{ __('messages.restore_form_title',['form' => __('messages.booking') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.restore_form_title',['form'=>  __('messages.booking') ]) }}"
            data-message='{{ __("messages.restore_msg") }}'
            data-datatable="reload">
            <i class="fas fa-redo text-secondary"></i>
        </a>
        <a href="{{ route('booking.action',['id' => $booking->id, 'type' => 'forcedelete']) }}"
            title="{{ __('messages.forcedelete_form_title',['form' => __('messages.booking') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.forcedelete_form_title',['form'=>  __('messages.booking') ]) }}"
            data-message='{{ __("messages.forcedelete_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    @endif
</div>
{{ Form::close() }}