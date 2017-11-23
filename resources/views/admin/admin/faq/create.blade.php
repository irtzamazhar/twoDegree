@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            FAQ'S
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">FAQ'S</li>
          </ol>
        </section>
        
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <!--<h3 class="box-title"></h3>-->
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <form action="{{ url('/createFaq') }}" method="post" id="blogpost">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('faqTitle') ? ' has-error' : '' }}">
                            <label for="faqTitle">FAQ Title</label>
                            <input type="text" class="form-control" value="{{ old('faqTitle') }}" id="faqTitle" name="faqTitle" placeholder="Enter FAQ Title">
                            @if($errors->has('faqTitle'))
                                <span class="help-block">{{ $errors->first('faqTitle') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('faq-status') ? ' has-error' : '' }}">
                            <label for="faqStatus">FAQ Status</label>
                            <select class="form-control" id="faq-status" name="faq-status">
                                <option value="">~~Status~~</option>
                                <option value="1">Publish</option>
                                <option value="0">Drafted</option>
                            </select>
                            @if($errors->has('faq-status'))
                                <span class="help-block">{{ $errors->first('faq-status') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('faq-content') ? ' has-error' : '' }}">
                            <label for="faqContent">FAQ Content</label>
                            <textarea placeholder="Enter FAQ Content..." id="editor1" rows="10" name="faq-content" class="form-control"> {{ old('faq-content') }}</textarea>
                            @if($errors->has('faq-content'))
                                <span class="help-block">{{ $errors->first('faq-content') }}</span>
                            @endif
                        </div>                        
                        <input type="submit" value="Submit" class="form-group btn btn-success btn-flat btn-md pull-right">
                        <a class="btn btn-flat btn-md btn-primary" href="{{ url('/admin/faq') }}">Go Back</a>
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