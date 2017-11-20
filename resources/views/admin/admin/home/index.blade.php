@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List of all Sections
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Manage HomePage</li>
          </ol>
        </section>
        
        <section>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success btn-flat btn-lg pull-right" href="{{ url('/admin/home/create') }}">Create A New Section</a>
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="table-layout: fixed;">
                        <thead>
                          <tr>
                            <th width="20%">Section Name</th>
                            <th width="30%">Section Image</th>
                            <th width="30%">Section Body</th>
                            <th width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($sections as $section)
                                <tr>
                                  <td>{{ $section->section_name }}</td>
                                  <td>{!! $section->section_content !!}</td>
                                  <td>
                                      <img src="{{ asset('storage/app/public/images/'.$section->section_image) }}" width="300" height="180">
                                  </td>
                                  <td>
                                      @if(!Auth::guest())
                                          <a href="{{ url('/admin/home/show/'.$section->id) }}" class="btn btn-primary btn-flat">View</a>
                                          <a href="{{ url('/admin/home/edit/'.$section->id) }}" class="btn btn-warning btn-flat">Edit</a>
                                          <a href="{{ url('/admin/home/delete/'.$section->id) }}" class="btn btn-danger btn-flat">Delete</a>
                                      @endif
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop

