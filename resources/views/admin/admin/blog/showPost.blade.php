@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Blog Post
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Blog Posts</li>
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
                    <h1>{{ $blog->title }}</h1>
                    <p>{{ date('F d, Y', strtotime($blog->created_at)) }}</p>
                    <div>{!! $blog->editor !!}</div>
                      @if(!Auth::guest())
                          <a href="{{ url('/admin/blog/editPost/'.$blog->id) }}" class="btn btn-warning btn-flat">Edit</a>
                          <a href="{{ url('/admin/blog/deletePost/'.$blog->id) }}" class="btn btn-danger btn-flat">Delete</a>
                      @endif
                      <a href="{{ url('admin/blog') }}" class="btn btn-primary btn-lg btn-flat pull-right">Go Back</a>
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop