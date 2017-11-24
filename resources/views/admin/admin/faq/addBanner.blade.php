@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            FAQ Banner
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">FAQ Banner</li>
          </ol>
        </section>
        
        <section class="invoice">
            <div>
                <div class="box-body">
                    @include('admin.admin.message')
                    @foreach($siteBanner as $faqBanner)
                        <div class="form-group">
                            <img src="{{ asset('storage/app/public/images/'. $faqBanner['banner_image']) }}" width="100%">
                        </div>
                    @endforeach
                    <form action="{{ action('FaqsController@storeBanner', $faqBanner['id']) }}" method="post" id="blogpost" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('banner-image') ? ' has-error' : '' }}">
                            <label for="banner-image">Banner Image</label>
                            <input type="hidden" id="page-name" name="page-name" value="faq">
                            <input type="file" class="form-control" id="banner-image" name="banner-image">
                            @if($errors->has('banner-image'))
                                <span class="help-block">{{ $errors->first('banner-image') }}</span>
                            @endif                            
                        </div>
                        <input type="submit" value="Post" class="form-group btn btn-success btn-flat btn-md pull-right">
                    </form>
                    <a class="btn btn-flat btn-md btn-primary" href="{{ url('/admin/faq') }}">Go Back</a>
                </div>
            </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      <!--<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>-->
<!--    <script>
        $.notify("Access granted", "success");
    </script>-->
      @stop