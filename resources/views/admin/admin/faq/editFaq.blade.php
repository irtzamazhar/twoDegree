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
        
        <section class="invoice">
            <div>
                <div class="box-header">
                    <h3 class="box-title">Edit FAQ</h3>
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <form action="{{ action('FaqsController@update', $faq->id) }}" method="post" id="blogpost">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="faqTitle">FAQ Title</label>
                            <input type="text" class="form-control" id="faqTitle" name="faqTitle" placeholder="Enter FAQ Title" value="{{ $faq->faq_title }}">
                            <p class="contact-er"></p>
                        </div>
                        <div class="form-group">
                            <label for="faqStatus">FAQ Status</label>
                            <select class="form-control" id="faq-status" name="faq-status">
                                @if( $faq->faq_status == 1 )
                                    <option value="">~~Status~~</option>
                                    <option value="1" selected="">Publish</option>
                                    <option value="0">Drafted</option>
                                @else
                                    <option value="">~~Status~~</option>
                                    <option value="1">Publish</option>
                                    <option value="0" selected="">Drafted</option>
                                @endif
                            </select>
                            <p class="contact-er"></p>
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea placeholder="Enter FAQ Content..." id="editor1" rows="10" name="faq-content" class="form-control" value="">{{ $faq->faq_content }}</textarea>
                            <p class="contact-er"></p>
                        </div>                        
                        <input type="submit" value="Submit" class="pull-right form-group btn btn-success btn-flat btn-md">
                        <a class="btn btn-md btn-flat btn-primary" href="{{ url('/admin/faq') }}">Go Back</a>
                    </form>
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