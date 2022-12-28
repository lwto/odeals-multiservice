<x-master-layout>
<div class="container-fluid">
    <div class="row">            
        <div class="col-lg-12">
            <div class="card card-block card-stretch">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <h5 class="font-weight-bold">{{$pageTitle}}</h5>
                        <a href="{{ route('provider.index') }}   " class="float-right btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> {{ __('messages.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div>
                            <ul class="list-style-1 mb-0">
                                <li class="list-item d-flex justify-content-start align-items-center">
                                    <div class="avatar">
                                        <img class="avatar avatar-img avatar-60 rounded-circle" src="{{ getSingleMedia($providerdata,'profile_image') }}" alt="01.jpg" />                        
                                    </div>
                                    <div class="list-style-detail ml-4 mr-2">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <h5 class="font-weight-bold mr-2">{{$providerdata->display_name}}</h5>
                                            <p class="mb-0 ">
                                                @php
                                                    $is_verify = verify_provider_document($providerdata->id)
                                                @endphp
                                                <span class="{{ $is_verify == 1 ? 'badge badge-success' : 'badge badge-danger' }}">{{$is_verify == 1 ? __('messages.verified') : __('messages.unverified') }}</span>
                                            </p>
                                        </div>
                                        @php
                                            $rating = optional($providerdata->getServiceRating)->first()->rating ?? 0;
                                        @endphp
                                        @while($rating > 0)
                                            @if($rating > 0.5)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="fas fa-star-half"></i>
                                            @endif
                                            @php $rating--; @endphp
                                        @endwhile
                                        
                                    </div>                                        
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td class="p-0">
                                    <p class="mb-0 text-muted">{{ __('messages.email') }}</p>                                        
                                </td>
                                <td>
                                    <p class="mb-0 ">{{$providerdata->email}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-0">
                                    <p class="mb-0 text-muted">{{ __('messages.contact_number') }}</p>                                        
                                </td>
                                <td>
                                    <p class="mb-0 ">{{$providerdata->contact_number}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-0">
                                    <p class="mb-0 text-muted">{{ __('messages.country') }}</p>                                        
                                </td>
                                <td>
                                    <p class="mb-0 ">{{optional($providerdata->country)->name}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-0">
                                    <p class="mb-0 text-muted">{{ __('messages.city') }}</p>                                        
                                </td>
                                <td>
                                    <p class="mb-0 ">{{optional($providerdata->city)->name}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-0">
                                    <p class="mb-0 text-muted">{{ __('messages.address') }}</p>                                        
                                </td>
                                <td>
                                    <p class="mb-0 ">{{$providerdata->address ? $providerdata->address : '-'}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-0">
                                    <p class="mb-0 text-muted">{{ __('messages.tax') }}</p>                                        
                                </td>
                                <td>
                                    @php
                                    $provider_tax = $providerdata->providerTaxMappingData->mapWithKeys(function ($item) {
                                        return  [$item->id => optional($item->taxes)->title];
                                    })->values()->implode(',');
                                    @endphp
                                    <p class="mb-0 ">{{$provider_tax ? $provider_tax : '-'}}</p>
                                </td>
                            </tr>
                        </table>
                    </li>
                </ul>
            </div>
        </div>  
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <h5>{{  __('messages.service') }}</h5>
                    </div>
                    {{ $dataTable->table(['class' => 'table  w-100'],false) }}
                </div>
            </div>
        </div>
    </div> 
</div>
@section('bottom_script')
    {{ $dataTable->scripts() }}
@endsection
</x-master-layout>