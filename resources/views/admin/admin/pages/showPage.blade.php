@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Pages
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Pages</li>
          </ol>
        </section>
        
        <section class="invoice">
            <div>
                <div class="box-header">
                    <h3 class="box-title">View Page</h3>
                </div>
                <table class="table table-striped view-any">
                    <tbody>
                        <tr>
                            <th style="width:10%">Page URL:</th>
                            <td>{{ $page->page_url }}</td>
                        </tr>
                        <tr>
                            <th>Page Title:</th>
                            <td><h1>{{ $page->page_title }}</h1></td>
                        </tr>
                        <tr>
                            <th>Page Content:</th>
                            <td>{!! $page->page_content !!}</td>
                        </tr>
                        <tr>
                            <th>Page Image:</th>
                            <td>
                                <img src="{{ asset('storage/app/public/images/'.$page->page_image) }}" width="100%" height="250"/>
                            </td>
                        </tr>
                    </tbody>
                  </table>
                @if(!Auth::guest())
                  <a href="{{ url('/admin/pages/editPage/'.$page->id) }}" class="btn btn-warning btn-flat pull-right">Edit</a>
                  <a href="{{ url('/admin/pages/deletePage/'.$page->id) }}" class="btn btn-danger btn-flat pull-right btn-dlt" onclick="return confirm('Are you sure?')">Delete</a>
              @endif
              <a href="{{ url('admin/pages') }}" class="btn btn-primary btn-md btn-flat">Go Back</a>
            </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop