
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['plans.destroy', $plan->id], 'method' => 'delete','data--submit'=>'plan'.$plan->id]) }}
<div class="d-flex justify-content-end align-items-center">
    @if(auth()->user()->hasAnyRole(['admin']))
        <a class="mr-2" href="{{ route('plans.create',['id' => $plan->id]) }}" title="{{ __('messages.update_form_title',['form' => __('messages.plan') ]) }}"><i class="fas fa-pen text-secondary"></i></a>
        <a class="mr-2" href="javascript:void(0)" data--submit="plan{{$plan->id}}" 
            data--confirmation='true' data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.plan') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.plan') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    @endif
</div>
{{ Form::close() }}