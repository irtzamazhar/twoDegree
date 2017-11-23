@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Event
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Event</li>
          </ol>
        </section>
        
        <section>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <div class="event-title">
                        <h4>Event Title:</h4>
                        <div>{{ $event->event_title }}</div>
                    </div>
                    <div class="event-day">
                        <h4>Event Day:</h4>
                        <div>{{ date('M d, Y', strtotime($event->event_day)) }}</div>
                    </div>
                    <div class="event-timing">
                        <h4>Event Timing:</h4>
                        <div>{{ date('h:iA', strtotime($event->event_timing1)) }} - {{ date('h:iA', strtotime($event->event_timing2)) }}</div>
                    </div>
                    <div class="event-details">
                        <h4>Event Details:</h4>
                        <div>{{ $event->event_detail }}</div>
                    </div>
                    <div class="event-image">
                        <h4>Event Image:</h4>
                        <img src="{{ asset('storage/app/public/images/'.$event->event_image) }}" width="330" height="300"/>
                        <!--<div>{{ $event->event_detail }}</div>-->
                    </div>
                    <div class="event-location">
                        <h4>Event Location:</h4>
                        <div>{{ $event->address }}</div>
                    </div>
                    <br><br>
                      @if(!Auth::guest())
                          <a href="{{ url('/admin/event/editEvent/'.$event->id) }}" class="btn btn-warning btn-flat pull-right">Edit</a>
                          <a href="{{ url('/admin/event/deleteEvent/'.$event->id) }}" class="btn btn-danger btn-flat pull-right btn-dlt">Delete</a>
                      @endif
                      <a href="{{ url('admin/event') }}" class="btn btn-primary btn-md btn-flat">Go Back</a>
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop