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
        
        <section>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success btn-flat btn-lg pull-right" href="{{ url('admin/blog/create') }}">Create A New Blog Post</a>
                  <a class="btn btn-primary btn-flat btn-lg pull-left" href="{{ url('admin/blog/addBanner') }}">Blog Banner</a>
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="table-layout: fixed;">
                        <thead>
                          <tr>
                            <th width="80%">Post Title</th>
                            <!--<th width="50%">Post Body</th>-->
                            <th width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                  <td><strong> {{ $blog->title }} </strong></td>
                                  <!--<td style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">{!! $blog->editor !!}</td>-->
                                  <td>
                                      @if(!Auth::guest())
                                          <a href="{{ url('/admin/blog/showPost/'.$blog->id) }}" class="btn btn-primary btn-flat ">View</a>
                                          <a href="{{ url('/admin/blog/editPost/'.$blog->id) }}" class="btn btn-warning btn-flat ">Edit</a>
                                          <a href="{{ url('/admin/blog/deletePost/'.$blog->id) }}" class="btn btn-danger btn-flat ">Delete</a>
                                      @endif
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      <!--<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>-->
      <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
      @stop

