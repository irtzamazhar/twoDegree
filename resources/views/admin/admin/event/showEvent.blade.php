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
            <li class="active">Event</li>
          </ol>
        </section>
        
        <section class="invoice">
            <div>
                <div class="box-header">
                  <h3 class="box-title">View Event</h3>
                </div>
                  @include('admin.admin.message')
                  <table class="table table-striped view-any">
                    <tbody>
                        <tr>
                            <th style="width:10%">Event Title:</th>
                            <td><h4>{{ $event->event_title }}</h4></td>
                        </tr>
                        <tr>
                            <th>Event Day:</th>
                            <td>{{ date('M d, Y', strtotime($event->event_day)) }}</td>
                        </tr>
                        <tr>
                            <th>Event Timing:</th>
                            <td>{{ date('h:iA', strtotime($event->event_timing1)) }} - {{ date('h:iA', strtotime($event->event_timing2)) }}</td>
                        </tr>
                        <tr>
                            <th>Event Details:</th>
                            <td>{{ $event->event_detail }}</td>
                        </tr>
                        <tr>
                            <th>Event Image:</th>
                            <td>
                                <img src="{{ asset('storage/app/public/images/'.$event->event_image) }}" width="330" height="300"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Event Location:</th>
                            <td>{{ $event->address }}</td>
                        </tr>
                    </tbody>
                  </table>
                  @if(!Auth::guest())
                      <a href="{{ url('/admin/event/editEvent/'.$event->id) }}" class="btn btn-warning btn-flat pull-right">Edit</a>
                      <a href="{{ url('/admin/event/deleteEvent/'.$event->id) }}" class="btn btn-danger btn-flat pull-right btn-dlt" onclick="return confirm('Are you sure?')">Delete</a>
                  @endif
                  <a href="{{ url('admin/event') }}" class="btn btn-primary btn-md btn-flat">Go Back</a>
            </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop