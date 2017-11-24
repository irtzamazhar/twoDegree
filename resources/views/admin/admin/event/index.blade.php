@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Events
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Events</li>
          </ol>
        </section>
        
        <section class="invoice">
            <div>
                <div class="box-header">
                  <a class="btn btn-primary btn-flat btn-md pull-left" href="{{ url('admin/event/addBanner') }}">Event Banner</a>
                  <a class="btn btn-success btn-flat btn-md btn-create pull-right" href="{{ url('/admin/event/create') }}">Create A New Event</a>
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="table-layout: fixed;">
                        <thead>
                          <tr>
                            <th width="15%">Event Title</th>
                            <th width="10%">Event Day</th>
                            <th width="15%">Event Timing</th>
                            <th width="25%">Event Details</th>
                            <th width="15%">Address</th>
                            <th width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($site_events as $event)
                                <tr>
                                  <td>{{ $event->event_title }}</td>
                                  <td>{{ date('M d, Y', strtotime($event->event_day)) }}</td>
                                  <td>{{ date('h:iA', strtotime($event->event_timing1)) }} - {{ date('h:iA', strtotime($event->event_timing2)) }}</td>
                                  <td>
                                    @php $truncated = str_limit( $event->event_detail , 50); @endphp
                                    {!! $truncated !!}
                                  </td>
                                  <td>{{ $event->address }}</td>
                                  <td>
                                      @if(!Auth::guest())
                                          <a href="{{ url('/admin/event/showEvent/'.$event->id) }}" class="btn btn-primary btn-flat">View</a>
                                          <a href="{{ url('/admin/event/editEvent/'.$event->id) }}" class="btn btn-warning btn-flat">Edit</a>
                                          <a href="{{ url('/admin/event/deleteEvent/'.$event->id) }}" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure?')">Delete</a>
                                      @endif
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$site_events->links()}}
                </div>
              </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop

