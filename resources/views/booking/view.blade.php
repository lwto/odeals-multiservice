<x-master-layout>
@php
    $extraValue = 0;
    $attachments = optional($bookingdata->service)->getMedia('service_attachment');
    if(!$attachments->isEmpty()){
        $image = $attachments[0]->getFullUrl();
    } else {
        $image = getSingleMedia(optional($bookingdata->service),'service_attachment');
    }
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-block card-stretch">
                                <div class="card-body p-0">
                                    <div class="d-flex justify-content-between align-items-center p-3 flex-wrap gap-3">
                                        <h5 class="font-weight-bold">{{__('messages.booking_detail')}}</h5>
                                        <a href="{{ route('booking.index') }}   " class="float-right btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> {{ __('messages.back') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card card-block card-stretch">
                                <div class="card-body p-0">
                                    <div class="d-flex justify-content-between align-items-center p-3">
                                        <h5 class="font-weight-bold">{{__('messages.book_id')}} {{ '#' . $bookingdata->id}} </h5>
                                        @if($bookingdata->handymanAdded->count() == 0)
                                        @hasanyrole('admin|demo_admin|provider')
                                            <a href="{{ route('booking.assign_form',['id'=> $bookingdata->id ]) }}" class="float-right btn btn-sm btn-primary loadRemoteModel"><i class="lab la-telegram-plane"></i> {{ __('messages.assign') }}</a>
                                        @endhasanyrole
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                            $file_extention = config('constant.IMAGE_EXTENTIONS');
                                            $extention = in_array(strtolower(imageExtention($image)),$file_extention);
                                        ?>
                                        <div class="col-md-1 galary file-gallary-{{$bookingdata->id}}" data-gallery=".file-gallary-{{$bookingdata->id}}">
                                            @if($extention)
                                                <a id="attachment_files" href="{{ $image }}" class="list-group-item-action attachment-list" target="_blank">
                                                    <img src='{{ $image }}' class="rounded shadow-sm border" style="height:64px" />
                                                </a>
                                            @else
                                                <a id="attachment_files" class="video list-group-item-action attachment-list" href="{{ $image }}" target="_blank">
                                                    <img src="{{ asset('images/file.png') }}" class="rounded shadow-sm border" style="height:64px">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column booking-service col-md-3">
                                            <b>{{__('messages.service')}}</b>
                                            <span>
                                                <small>{{optional($bookingdata->service)->name ?? '-'}}</small>
                                                @hasanyrole('admin|demo_admin|handyman')
                                                <small>{{ __('messages.by') ." ". optional($bookingdata->provider)->display_name ?? '-' }}</small>
                                                @endhasanyrole
                                            </span>
                                            @php
                                                $assigned_service = $bookingdata->handymanAdded->mapWithKeys(function ($item) {
                                                    return  [$item->handyman_id => optional($item->handyman)->display_name];
                                                })->values()->implode(',');
                                            @endphp
                                            @if(!empty($assigned_service))
                                                @hasanyrole('admin|demo_admin|provider')
                                                    <p> <b>{{__('messages.assign_to')}}</b> <small>{{$assigned_service}} </small></p>
                                                @endhasanyrole
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <b>{{ ($bookingdata->service->type === 'hourly') ? __('messages.duration') : __('messages.quantity') }} ({{$bookingdata->service->type }})</b>
                                            <p>
                                                <small>{{  ($bookingdata->service->type === 'hourly') ? convertToHoursMins($bookingdata->duration_diff) : $bookingdata->quantity}}</small>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <b>{{__('messages.price')}}</b>
                                            <p>{{ isset($bookingdata->service) ? getPriceFormat($bookingdata->service->price) : 0 }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($bookingdata->bookingExtraCharge->count() > 0 )
                        <div class="col-lg-12">
                            <div class="card card-block card-stretch">
                                <div class="card-body">
                                    <h5 class="card-title" style="padding-bottom:15px;">{{__('messages.extra_charge')}}</h5>
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>{{__('messages.title')}}</th>
                                                    <th></th>
                                                    <th>{{__('messages.price')}}</th>
                                                    <th></th>
                                                    <th>{{__('messages.quantity')}}</th>
                                                    <th></th>
                                                    <th>{{__('messages.total_amount')}}</th>
                                                </tr>
                                                @foreach($bookingdata->bookingExtraCharge as $chrage)
                                                @php
                                                    $extraValue += $chrage->price * $chrage->qty;
                                                @endphp
                                                <tr>
                                                    <td class="center">{{$chrage->title}}</td>
                                                    <td></td>
                                                    <td class="left strong">{{getPriceFormat($chrage->price)}}</td>
                                                    <td></td>
                                                    <td class="left strong">{{$chrage->qty}}</td>
                                                    <td></td>
                                                    <td class="left strong">{{getPriceFormat($chrage->price * $chrage->qty)}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-12">
                            <div class="card card-block card-stretch">
                                <div class="card-body">
                                    <h5 class="card-title" style="padding-bottom:15px;">{{__('messages.payment_details')}}</h5>
                                        <div class="table-responsive-sm">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="center">{{__('messages.payment_status')}}</td>
                                                        <td></td>
                                                        <td class="left strong">{{optional($bookingdata->payment)->payment_status ?? '-'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center">{{__('messages.payment_method')}}</td>
                                                        <td></td>
                                                        <td class="left strong">{{optional($bookingdata->payment)->payment_method ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th rowspan="7" class="responsive-hide"></th>
                                                    </tr>
                                                    @if($bookingdata->service->type === 'fixed')
                                                    <tr>
                                                        <td>{{__('messages.quantity')}}</td>
                                                        <td class="text-right">x {{!empty($bookingdata->quantity) ? $bookingdata->quantity : 0}}</td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <td>{{__('messages.sub_total')}}</td>
                                                        @php 
                                                            if($bookingdata->service->type === 'fixed'){
                                                                $sub_total = ($bookingdata->amount) * ($bookingdata->quantity);
                                                            }else{
                                                                $sub_total = $bookingdata->amount;
                                                            }
                                                        @endphp
                                                        <td class="text-right">{{!empty($sub_total) ? getPriceFormat($sub_total) : 0}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('messages.coupon')}} (-)</td>
                                                        @php
                                                            $discount = '';
                                                           if($bookingdata->couponAdded != null){
                                                               $discount = optional($bookingdata->couponAdded)->discount ?? '-';
                                                               $discount_type = optional($bookingdata->couponAdded)->discount_type ?? 'fixed';
                                                               $discount = getPriceFormat($discount);
                                                               if($discount_type == 'percentage'){
                                                                    $discount = $discount .'%';
                                                               }
                                                           }
                                                        @endphp
                                                        <td class="text-right">( {{ optional($bookingdata->couponAdded)->code ?? '-' }}) {{ $discount }}  </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{__('messages.discount')}} (-)</td>
                                                        <td class="text-right">{{!empty($bookingdata->discount) ? $bookingdata->discount : 0}}%</td>
                                                    </tr>
                                                    @if($bookingdata->bookingExtraCharge->count() > 0 )
                                                    <tr>
                                                        <td>{{__('messages.extra_charge')}} (+)</td>
                                                        <td class="text-right">{{getPriceFormat($extraValue)}}</td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <td>{{__('messages.total_amount')}}</td>
                                                        <td class="text-right">{{!empty($bookingdata->total_amount) ? getPriceFormat($bookingdata->total_amount + $extraValue ): 0}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">   
                        <div class="col-md-4 col-sm-6 col-lg-12">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="profile-card rounded mb-3">
                                        <img src="{{ getSingleMedia($bookingdata->customer,'profile_image') }}" alt="profile-bg" class="avatar-100 d-block mx-auto img-fluid mb-3  avatar-rounded">
                                        <h3 class="text-white text-center">{{optional($bookingdata->customer)->display_name ?? '-'}}</h3>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                            <div class="p-icon mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"></path>
                                                </svg>
                                            </div>
                                            <p class="mb-0">{{ optional($bookingdata->customer)->email ?? '-'}}</p>
                                        </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="p-icon mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z"></path>
                                            </svg>
                                        </div>
                                        <p class="mb-0">{{ optional($bookingdata->customer)->contact_number ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-lg-12">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex flex-xl-row flex-column justify-content-between align-items-center align-items-xl-start px-0"> 
                                            <b>{{ __('messages.book_at') }}</b>
                                            <?php   date_default_timezone_set( $admin->time_zone ?? 'UTC'); ?>
                                            <small>{{ !empty($bookingdata->date) ? $bookingdata->date : '-' }}</small>
                                        </li>
                                        <li class="list-group-item d-flex flex-xl-row flex-column justify-content-between align-items-center align-items-xl-start px-0"> 
                                            <b>{{ __('messages.start_at') }}</b>
                                            <small>{{ !empty($bookingdata->start_at) ? $bookingdata->start_at : '-' }}</small>
                                        </li>
                                        <li class="list-group-item d-flex flex-xl-row flex-column justify-content-between align-items-center align-items-xl-start px-0"> 
                                            <b>{{ __('messages.end_at') }}</b>
                                            <small>{{ !empty($bookingdata->end_at) ? $bookingdata->end_at : '-' }}</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if(count($bookingdata->bookingActivity) > 0)
                        <div class="col-md-5 col-lg-12">
                            <div class="card">
                                <div class="card-body activity-height">
                                    <ul class="iq-timeline">
                                    <?php   date_default_timezone_set( $admin->time_zone ?? 'UTC'); ?>
                                        @foreach($bookingdata->bookingActivity as $activity)
                                            <li>
                                                <div class="timeline-dots"></div>
                                                <h6 class="float-left mb-1">{{str_replace("_"," ",ucfirst($activity->activity_type))}}</h6>
                                                <small class="float-right mt-1">{{$activity->datetime}}</small>
                                                <div class="d-inline-block w-100">
                                                    <p>{{$activity->activity_message}}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('bottom_script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.galary').each(function (index,value) {
                let galleryClass = $(value).attr('data-gallery');
                $(galleryClass).magnificPopup({
                    delegate: 'a#attachment_files',
                    type: 'image',
                    callbacks: {
                        elementParse: function(item) {
                            if(item.el[0].className.includes('video')) {
                                item.type = 'iframe',
                                item.iframe = {
                                    markup: '<div class="mfp-iframe-scaler">'+
                                            '<div class="mfp-close"></div>'+
                                            '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                                            '<div class="mfp-title">Some caption</div>'+
                                        '</div>'
                                }
                            } else {
                                item.type = 'image',
                                item.tLoading = 'Loading image #%curr%...',
                                item.mainClass = 'mfp-img-mobile',
                                item.image = {
                                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                                }
                            }
                        }
                    }
                })
            })
        })
    </script>
@endsection
</x-master-layout>