
{{ Form::model($settings,['method' => 'POST','route'=>'sendPushNotification', 'enctype'=>'multipart/form-data', 'data-toggle'=>"validator" ,'id'=>'push_notification'] ) }}
    {{ Form::hidden('id') }}
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('title',trans('messages.title').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
            {{ Form::text('title',old('title'),['placeholder' => trans('messages.title'),'class' =>'form-control','required']) }}
            <small class="help-block with-errors text-danger"></small>
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('type',trans('messages.type').' <span class="text-danger">*</span>',['class'=>'form-control-label '],false) }}
            {{ Form::select('type',['alldata' => __('messages.all') , 'service' => __('messages.service') ],old('type'),[ 'id' => 'type' ,'class' =>'form-control select2js notification_type','required']) }}
        </div>
        <div class="form-group col-md-12 d-none" id="select_service">
            {{ Form::label('name', __('messages.select_name',[ 'select' => __('messages.service') ]).' <span class="text-danger">*</span>',['class'=>'form-control-label','data-placeholder' => __('messages.select_name',[ 'select' => __('messages.tax') ])],false) }}
            <br />
            <select class="form-control service" name="service_id">
             @foreach($services as $key => $value)
                <option id="{{$key}}" data-type="{{$value}}" value="{{$key}}">{{$value}}</option>
             @endforeach
            </select>
        </div>
        <div class="form-group col-md-12">
            {{ Form::label('description',trans('messages.description').' <span class="text-danger">*</span>', ['class' => 'form-control-label'],false) }}
            {{ Form::textarea('description', null, ['class'=>"form-control textarea" ,'id'=>'description','rows'=>3  , 'required','placeholder'=> __('messages.description') ]) }}
        </div>
    </div>
    {{ Form::submit( trans('messages.save'), ['class'=>'btn btn-md btn-primary float-right']) }}
{{ Form::close() }}
<script>
    $(document).ready(function (){
        var value =  $('.service').find(':selected').attr('data-type');
        $(document).on('change','.notification_type',function(){
            var type =  $(this).val();
            if(type == 'service'){
                textareaValue(value)
                $('#select_service').removeClass('d-none');
            }else{
                $('#select_service').addClass('d-none');
                $('#description').val('')
            }
        });
        $(document).on('change','.service',function(){
            var value =  $(this).find(':selected').attr('data-type');
            textareaValue(value)
            
        });
    });
    function textareaValue(value){
        $('#description').val(value)
    }
</script>
               