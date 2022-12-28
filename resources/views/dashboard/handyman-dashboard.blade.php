<x-master-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="modal fade" id="handymanModal" tabindex="-1" aria-labelledby="handymanModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="handymanModalLabel">{{__('messages.dashboard_customizer')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    {{ Form::open(['method' => 'POST','route' => 'handymantogglesetting']) }}
                    
                        @if($data['handyman_dashboard_setting'] != [] && !empty($data['handyman_dashboard_setting']->Top_Cards) || $show == "true" )         
                          {{Form::checkbox('Top Cards', "top_card",true)}}Top Cards<br>       
                        @else
                          {{Form::checkbox('Top Cards', "top_card",false)}}Top Cards<br>       
                        @endif
                      
                        @if($data['handyman_dashboard_setting'] != [] && !empty($data['handyman_dashboard_setting']->Schedule_Card) || $show == "true")         
                        {{Form::checkbox('Schedule Card', "schedule_card", true)}}Schedule Card<br>       
                        @else
                        {{Form::checkbox('Schedule Card', "schedule_card", false)}}Schedule Card<br>      
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                    </div>
                    </div>
                </div>
            </div>
            @if($data['handyman_dashboard_setting'] != [] && !empty($data['handyman_dashboard_setting']->Top_Cards) || $show == "true")
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-2 font-weight-bold text-primary">{{ !empty($data['dashboard']['count_total_booking']) ? $data['dashboard']['count_total_booking']: 0 }} </h5>
                                            <p class="mb-0 ml-3 text-success font-weight-bold"></p>
                                        </div>
                                        <p class="mb-0 text-secondary">{{ __('messages.total_name', ['name' => __('messages.booking')]) }}</p>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <div class="iq-card-icon icon-shape bg-primary text-white rounded-circle shadow">
                                            <i class="ri-calendar-check-line"></i>
                                        </div>
                                        <a class="pt-2" href="{{ route('booking.index') }}">{{__('messages.view_all')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-2 font-weight-bold text-primary">{{ !empty($data['dashboard']['count_handyman_pending_booking']) ? $data['dashboard']['count_handyman_pending_booking'] : 0 }}</h5>
                                            <p class="mb-0 ml-3 text-success font-weight-bold"></p>
                                        </div>
                                        <p class="mb-0 text-secondary">{{ __('messages.pending', ['name' => __('messages.booking')]) }}</p>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <div class="iq-card-icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="ri-service-line"></i>
                                        </div>
                                        <a class="pt-2" href="{{ route('booking.index') }}">{{__('messages.view_all')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-2 font-weight-bold text-primary">{{ !empty($data['dashboard']['count_handyman_complete_booking']) ? $data['dashboard']['count_handyman_complete_booking'] : 0 }}</h5>
                                            <p class="mb-0 ml-3 text-danger font-weight-bold"></p>
                                        </div>
                                        <p class="mb-0 text-secondary">{{ __('messages.complete', ['name' => __('messages.booking')]) }}</p>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <div class="iq-card-icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="las la-user-friends"></i>
                                        </div>
                                        <a class="pt-2" href="{{ route('booking.index') }}">{{__('messages.view_all')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-2 font-weight-bold text-primary">{{ getPriceFormat($data['total_revenue']) }}</h5>
                                            <p class="mb-0 ml-3 text-danger font-weight-bold"></p>
                                        </div>
                                        <p class="mb-0 text-secondary">{{ __('messages.total_name', ['name' => __('messages.revenue')]) }}</p>
                                    </div>
                                    <div class="col-auto d-flex flex-column">
                                        <div class="iq-card-icon icon-shape bg-success text-white rounded-circle shadow">
                                            <i class="ri-secure-payment-line"></i>
                                        </div>
                                        <a class="pt-2" href="{{ route('handymanpayout.index') }}">{{__('messages.view_all')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($data['handyman_dashboard_setting'] != [] && !empty($data['handyman_dashboard_setting']->Schedule_Card) || $show == "true")
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-body">
                  <div id='calendar'></div>
                </div>
              </div>
            </div>
            @endif
        </div>
        <!-- Page end  -->
    </div>
    @section('bottom_script')
    <script>
    if (jQuery('#calendar').length) {
      document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {

      plugins: [ 'dayGrid','timeGrid', 'dayGrid', 'list','interaction','bootstrap' ],
      defaultView: 'dayGridMonth',
      displayEventTime: true,
      themeSystem: 'bootstrap',
      header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
          clear: ''
      },
      height : 600,
      selectable: true,
      selectHelper: true,
      editable: true,
      eventLimit: false,
      showNonCurrentDates : false,
      droppable: false,
      editable:false,
      eventSources:[{
        events: function (info, successCallback, failureCallback) {
            $.ajax({
                url:  "{{ route('home') }}",
                dataType: 'JSON',
                data: {
                    start: info['startStr'],
                    end: info['endStr'],
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    successCallback(response);
                    return response;
                },
                failure: function(data){
                    failureCallback(data);
                }
            });
        },
        color  : "rgb(19, 193, 240)",
        textColor : "#fff",
        eventDataTransform: function(eventData) {
          return {
              id: eventData.id,
              title: (eventData.service != null && eventData.service != '') ? eventData.service.name : '-' ,
              start: eventData.date,
          };
        },
      }],
      eventRender: function (event, element, view) {
          if (event.allDay === 'true') {
              event.allDay = true;
          } else {
              event.allDay = false;
          }
      },
      eventDrop: function(info) {},
      eventClick:  function(info) {
        var id = info.event.id;
        var url = "{{ URL::to('booking') }}/"+id;
        window.location.replace(url);
      },
    });
    calendar.render();
    });
    }
</script>
    @endsection
</x-master-layout>

