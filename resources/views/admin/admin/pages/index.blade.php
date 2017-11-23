@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List of all pages
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Manage Pages</li>
          </ol>
        </section>
        
        <section>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success btn-flat btn-md btn-create pull-right" href="{{ url('/admin/pages/create') }}">Create A New Page</a>
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="table-layout: fixed;">
                        <thead>
                          <tr>
                            <th width="20%">Page Url</th>
                            <th width="30%">Page Title</th>
                            <th width="30%">Page Content</th>
                            <th width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                  <td>{{ $page->page_url }}</td>
                                  <td>{{ $page->page_title }}</td>
                                  <td>
                                    @php $truncated = str_limit( $page->page_content , 50); @endphp
                                    <div>{!! $truncated !!}</div>
                                  </td>
                                  <td>
                                      @if(!Auth::guest())
                                          <a href="{{ url('/admin/pages/showPage/'.$page->id) }}" class="btn btn-primary btn-flat">View</a>
                                          <a href="{{ url('/admin/pages/editPage/'.$page->id) }}" class="btn btn-warning btn-flat">Edit</a>
                                          <a href="{{ url('/admin/pages/deletePage/'.$page->id) }}" class="btn btn-danger btn-flat">Delete</a>
                                      @endif
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$pages->links()}}
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop

