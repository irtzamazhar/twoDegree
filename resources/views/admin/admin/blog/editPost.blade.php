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
        
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <form action="{{ action('BlogController@update', $blog->id) }}" method="post" id="blogpost">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title" value="{{ $blog->title }}">
                            <p class="contact-er"></p>
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea placeholder="Enter Post Body..." id="editor1" rows="10" name="blog-post" class="form-control" value="">{{ $blog->editor }}</textarea>
                            <p class="contact-er"></p>
                        </div>                        
                        <input type="submit" value="Post" class="form-group btn btn-success btn-flat btn-lg">
                        <a class="btn btn-lg btn-flat btn-danger pull-right" href="{{ url('/admin/blog') }}">Go Back</a>
                    </form>
                </div>
              </div>
            </div>
          </div>
          
      </div><!-- /.content-wrapper -->
      <!--<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>-->
      <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
      @stop