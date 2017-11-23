@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Pages
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Pages</li>
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
                    <div class="page-url">
                        <h4>Page URL:</h4>
                        <div>{{ $page->page_url }}</div>
                    </div>
                    <div class="page-title">
                        <h4>Page Title:</h4>
                        <div>{{ $page->page_title }}</div>
                    </div>

                    <div class="page-content">
                        <h4>Page Content:</h4>
                        <div>{!! $page->page_content !!}</div>
                    </div>
                    <div class="event-image">
                        <h4>Event Image:</h4>
                        <img src="{{ asset('storage/app/public/images/'.$page->page_image) }}" width="1500" height="350"/>
                        
                    </div>
                    <div style="margin-top: 20px;">
                      @if(!Auth::guest())
                          <a href="{{ url('/admin/pages/editPage/'.$page->id) }}" class="btn btn-warning btn-flat pull-right">Edit</a>
                          <a href="{{ url('/admin/pages/deletePage/'.$page->id) }}" class="btn btn-danger btn-flat pull-right btn-dlt">Delete</a>
                      @endif
                      <a href="{{ url('admin/pages') }}" class="btn btn-primary btn-md btn-flat">Go Back</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop