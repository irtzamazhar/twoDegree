@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Event
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Events</li>
          </ol>
        </section>
        
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <form action="{{ action('SiteEventsController@update', $event->id) }}" method="post" id="event" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group col-xs-12">
                            <label for="eventTitle">Event Title</label>
                            <input type="text" class="form-control" id="event-title" name="event-title" value="{{ $event->event_title }}" placeholder="Enter Event Title">
                            <p class="contact-er"></p>
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="eventDay">Event Day</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" class="form-control pull-right" id="datepicker" value="{{ $event->event_day }}" name="event-day" placeholder="Event Day">
                            </div>
                            <p class="contact-er"></p>
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="title">Event Timing</label>
                            <div class="input-group time">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="form-control pull-right" id="timing1" name="event-timing1" value="{{ $event->event_timing1 }}" placeholder="Event Day">
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="form-control pull-right" id="timing2" name="event-timing2" value="{{ $event->event_timing2 }}" placeholder="Event Day">
                                </div>
                            </div>
                            <!--<input type="time" class="form-control" id="title" name="title" placeholder="Enter Post Title">-->
                            <p class="contact-er"></p>
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="eventDetail">Event Detail</label>
                            <textarea placeholder="Enter Event Details..." id="event-detail" rows="10" name="event-detail" class="form-control">{{ $event->event_detail }}</textarea>
                            <!--<input type="file" class="form-control" name="event-image" id="event-image">-->
                            <p class="contact-er"></p>
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="eventLocation">Event Location</label>
                            <input id="event-location" type="text" name="event-location" class="form-control" autocomplete="on" value="{{ $event->address }}">
                            <input type="hidden" id="place-lng" name="place-lng" value="{{ $event->place_lng }}">
                            <input type="hidden" id="place-lat" name="place-lat" value="{{ $event->place_lat }}">
                            <input type="hidden" id="address" name="address" value="{{ $event->address }}">
                            <p class="contact-er"></p>
                        </div>
                        <div class="form-group col-xs-12">
                            <input type="submit" value="Post" class="form-group btn btn-success btn-flat pull-right btn-md">
                            <a href="{{ url('admin/event') }}" class="btn btn-primary btn-md btn-flat">Go Back</a>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          
      </div><!-- /.content-wrapper -->
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyApozjbWyK5N9aq4Kc8DIpTxJg2DHuLVDU&sensor=false&libraries=places"></script>
      <script>
        var inputFrom = document.getElementById('event-location');

        var autocompleteFrom = new google.maps.places.Autocomplete(inputFrom);
        google.maps.event.addListener(autocompleteFrom, 'place_changed', function () {
            var place = autocompleteFrom.getPlace();

            var place_id = place.id;
            var place_name = place.name;
            var place_lat = place.geometry.location.lat();
            var place_lng = place.geometry.location.lng();
            var address = place.formatted_address
            var senddata = {"address": address, "id": place_id, "lat": place_lat, "lng": place_lng, "name": place_name};
            document.getElementById('place-lng').value = place_lng;
            document.getElementById('place-lat').value = place_lat;
            document.getElementById('address').value = address;
            console.log(place_lng);
            console.log(place_lat);
           
            $scope.hangout_place = place_name;
            $scope.profie_img_url2 = "images/noimage.png";
            window.localStorage.setItem('hangout', JSON.stringify(senddata));
            document.getElementById('my-modal2').style.display = 'block';

        });
      </script>
      
      @stop