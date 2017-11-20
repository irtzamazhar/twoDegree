@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage HomePage
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage HomePage</li>
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
                    <div class="section-name">
                        <h4>Section Name:</h4>
                        <div>{{ $section->section_name }}</div>
                    </div>

                    <div class="section-content">
                        <h4>Section Content:</h4>
                        <div>{!! $section->section_content !!}</div>
                    </div>
                    <div class="section-image">
                        <h4>Section Image:</h4>
                        <img src="{{ asset('storage/app/public/images/'.$section->section_image) }}" width="100%"/>
                    </div>
                    <div style="margin-top: 20px;">
                      @if(!Auth::guest())
                          <a href="{{ url('/admin/home/edit/'.$section->id) }}" class="btn btn-warning btn-flat">Edit</a>
                          <a href="{{ url('/admin/home/delete/'.$section->id) }}" class="btn btn-danger btn-flat">Delete</a>
                      @endif
                      <a href="{{ url('admin/home') }}" class="btn btn-primary btn-lg btn-flat pull-right">Go Back</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop