@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Contact Banner
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Contact Banner</li>
          </ol>
        </section>
        
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body">
                    @include('admin.admin.message')
                    @foreach($siteBanner as $contactBanner)
                        <div class="form-group">
                            <img src="{{ asset('storage/app/public/images/'. $contactBanner['banner_image']) }}" width="100%">
                        </div>
                    @endforeach
                    @foreach($siteBanner as $contactBanner)
                    <form action="{{ action('ContactController@storeBanner', $contactBanner['id']) }}" method="post" id="blogpost" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('banner-image') ? ' has-error' : '' }}">
                            <label for="banner-image">Banner Image</label>
                            <input type="hidden" id="page-name" name="page-name" value="contact">
                            <input type="file" class="form-control" value="{{ old('banner-image') }}" id="banner-image" name="banner-image">
                            @if($errors->has('banner-image'))
                                <span class="help-block">{{ $errors->first('banner-image') }}</span>
                            @endif                            
                        </div>
                        <input type="submit" value="Post" class="form-group btn btn-success btn-flat btn-lg pull-right">
                    </form>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          
      </div><!-- /.content-wrapper -->
      <!--<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>-->
<!--    <script>
        $.notify("Access granted", "success");
    </script>-->
      @stop