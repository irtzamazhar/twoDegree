@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Blog Posts
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Blog Posts</li>
          </ol>
        </section>
        
        <section class="invoice">
            <div>
                <div class="box-header">
                    <h2 class="box-title">View Blog Post</h2>
                </div>
                  @include('admin.admin.message')
                  <table class="table table-striped view-any">
                    <tbody>
                        <tr>
                            <th style="width:10%">Blog Title:</th>
                            <td><h4>{{ $blog->title }}</h4></td>
                        </tr>
                        <tr>
                            <th>Blog Date:</th>
                            <td><small>{{ date('F d, Y', strtotime($blog->created_at)) }}</small></td>
                        </tr>
                        <tr>
                            <th>Blog Content:</th>
                            <td>{!! $blog->editor !!}</td>
                        </tr>
                    </tbody>
                  </table>
                  @if(!Auth::guest())
                      <a href="{{ url('/admin/blog/editPost/'.$blog->id) }}" class="btn btn-warning pull-right btn-flat">Edit</a>
                      <a href="{{ url('/admin/blog/deletePost/'.$blog->id) }}" class="btn btn-danger btn-flat pull-right btn-dlt">Delete</a>
                  @endif
                  <a href="{{ url('admin/blog') }}" class="btn btn-primary btn-md btn-flat">Go Back</a>
            </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop