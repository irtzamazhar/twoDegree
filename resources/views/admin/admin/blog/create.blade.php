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
                  <h3 class="box-title">Blog</h3>
                </div>
                <div class="box-body">
                    <form action="{{ url('/createBlogPost') }}" method="post" id="blogpost">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title" placeholder="Enter Post Title">
                            @if($errors->has('title'))
                                <span class="help-block">{{ $errors->first('title') }}</span>
                            @endif                            
                        </div>
                        <div class="form-group {{ $errors->has('blog-post') ? ' has-error' : '' }}">
                            <label for="body">Body</label>
                            <textarea placeholder="Enter Post Body..." id="editor1" rows="10" name="blog-post" class="form-control">{{ old('blog-post') }}</textarea>
                            @if($errors->has('blog-post'))
                                <span class="help-block">{{ $errors->first('blog-post') }}</span>
                            @endif
                        </div>                        
                        <input type="submit" value="Post" class="form-group btn btn-success btn-flat btn-lg">
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
<!--    <script>
        $.notify("Access granted", "success");
    </script>-->
      @stop