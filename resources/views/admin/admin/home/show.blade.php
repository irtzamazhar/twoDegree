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
        
        <section class="invoice">
            <div>
                <div class="box-header">
                    <h3 class="box-title">View Page Section</h3>
                </div>
                  @include('admin.admin.message')
                  <table class="table table-striped view-any">
                    <tbody>
                        <tr>
                            <th>Section Name:</th>
                            <td><h1>{{ $section->section_name }}</h1></td>
                        </tr>
                        <tr>
                            <th>Section Content:</th>
                            <td>{!! $section->section_content !!}</td>
                        </tr>
                        <tr>
                            <th>Section Image:</th>
                            <td><img src="{{ asset('storage/app/public/images/'.$section->section_image) }}" width="100%"/></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                @if(!Auth::guest())
                          <a href="{{ url('/admin/home/edit/'.$section->id) }}" class="btn btn-warning btn-flat pull-right">Edit</a>
                          <a href="{{ url('/admin/home/delete/'.$section->id) }}" class="btn btn-danger btn-dlt btn-flat pull-right" onclick="return confirm('Are you sure?')">Delete</a>
                      @endif
                      <a href="{{ url('admin/home') }}" class="btn btn-primary btn-md btn-flat ">Go Back</a>
                            </td>
                        </tr>
                    </tbody>
                  </table>
            </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop