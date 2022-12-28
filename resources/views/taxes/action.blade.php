
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['tax.destroy', $tax->id], 'method' => 'delete','data--submit'=>'tax'.$tax->id]) }}
<div class="d-flex justify-content-end align-items-center">
    <a class="mr-2" href="{{ route('tax.create',['id' => $tax->id]) }}" title="{{ __('messages.update_form_title',['form' => __('messages.tax') ]) }}"><i class="fas fa-pen text-secondary"></i></a>

    <a class="mr-2" href="javascript:void(0)" data--submit="tax{{$tax->id}}" 
        data--confirmation='true' data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.tax') ]) }}"
        title="{{ __('messages.delete_form_title',['form'=>  __('messages.tax') ]) }}"
        data-message='{{ __("messages.delete_msg") }}'>
        <i class="far fa-trash-alt text-danger"></i>
    </a>
</div>
{{ Form::close() }}