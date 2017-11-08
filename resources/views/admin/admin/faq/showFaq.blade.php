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
        
        <section>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <h1>{{ $faq->faq_title }}</h1>
                    <p>{!! $faq->faq_content !!}</p>
                      @if(!Auth::guest())
                          <a href="{{ url('/admin/faq/editFaq/'.$faq->id) }}" class="btn btn-warning btn-flat">Edit</a>
                          <a href="{{ url('/admin/faq/deleteFaq/'.$faq->id) }}" class="btn btn-danger btn-flat">Delete</a>
                      @endif
                      <a href="{{ url('admin/faq') }}" class="btn btn-primary btn-lg btn-flat pull-right">Go Back</a>
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop