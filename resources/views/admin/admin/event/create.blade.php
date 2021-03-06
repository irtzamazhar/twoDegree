@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Event
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Events</li>
          </ol>
        </section>
        
        <section class="invoice">
            <div>
                <div class="box-header">
                  <h3 class="box-title">Creat Event</h3>
                </div>
                <div class="box-body">
                    <form action="{{ url('/createEvent') }}" method="post" id="blogpost" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-xs-12 {{ $errors->has('event-title') ? ' has-error' : '' }}">
                                <label for="eventTitle">Event Title</label>
                                <input type="text" class="form-control" id="event-title" value="{{ old('event-title') }}" name="event-title" placeholder="Enter Event Title">
                                @if($errors->has('event-title'))
                                    <span class="help-block">{{ $errors->first('event-title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 {{ $errors->has('event-day') ? ' has-error' : '' }}">
                                <label for="eventDay">Event Day</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" class="form-control pull-right" value="{{ old('event-day') }}" id="datepicker" name="event-day" placeholder="Event Day">
                                </div>
                                @if($errors->has('event-day'))
                                    <span class="help-block">{{ $errors->first('event-day') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-6 {{ $errors->has('event-timing1') ? ' has-error' : '' }}">
                                <label for="title">Event Timing</label>
                                <div class="input-group time">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="time" class="form-control pull-right" value="{{ old('event-timing1') }}" id="timing1" name="event-timing1" placeholder="Event Day">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control pull-right" value="{{ old('event-timing2') }}" id="timing2" name="event-timing2" placeholder="Event Day">
                                        </div>
                                    </div>
                                </div>
                                @if($errors->has('event-timing1'))
                                    <span class="help-block">{{ $errors->first('event-timing1') }}</span>
                                @endif
                                <!--<input type="time" class="form-control" id="title" name="title" placeholder="Enter Post Title">-->
                                <p class="contact-er"></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-xs-12 {{ $errors->has('event-detail') ? ' has-error' : '' }}">
                                <label for="eventDetail">Event Detail</label>
                                <textarea placeholder="Enter Event Details..." id="event-detail" rows="10" name="event-detail" class="form-control">{{ old('event-detail') }}</textarea>
                                @if($errors->has('event-detail'))
                                    <span class="help-block">{{ $errors->first('event-detail') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-12 {{ $errors->has('event-image') ? ' has-error' : '' }}">
                                <input type="file" class="form-control" name="event-image" id="event-image">
                                @if($errors->has('event-image'))
                                    <span class="help-block">{{ $errors->first('event-image') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-xs-12 {{ $errors->has('event-location') ? ' has-error' : '' }}">
                                <label for="eventLocation">Event Location</label>
                                <input id="event-location" type="text" name="event-location" class="form-control" autocomplete="on">
                                @if($errors->has('event-location'))
                                    <span class="help-block">{{ $errors->first('event-location') }}</span>
                                @endif
                                <input type="hidden" id="place-lng" name="place-lng" value="">
                                <input type="hidden" id="place-lat" name="place-lat" value="">
                                <input type="hidden" id="address" name="address" value="">
                                <p class="contact-er"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="submit" value="Post" class="form-group btn btn-success btn-flat btn-md pull-right">
                                <a href="{{ url('admin/event') }}" class="btn btn-primary btn-md btn-flat">Go Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
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
            console.log(place_lng);
            console.log(place_lat);
            document.getElementById('place-lng').value = place_lng;
            document.getElementById('place-lat').value = place_lat;
            document.getElementById('address').value = address;
           
            $scope.hangout_place = place_name;
            $scope.profie_img_url2 = "images/noimage.png";
            window.localStorage.setItem('hangout', JSON.stringify(senddata));
            document.getElementById('my-modal2').style.display = 'block';

        });
      </script>
      
      @stop