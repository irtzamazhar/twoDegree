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
                  <a class="btn btn-success btn-flat btn-lg pull-right" href="{{ url('admin/faq/create') }}">Create A New FAQ</a>
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="table-layout: fixed;">
                        <thead>
                          <tr>
                              <th width="20%"> FAQ Title</th>
                            <th width="40%"><center>FAQ Content</center></th>
                            <th width="20%"><center>Status</center></th>
                            <th width="20%"><center>Actions</center></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($faqs as $faq)
                                <tr>
                                  <td style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><strong> {{ $faq->faq_title }} </strong></td>
                                  <td style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">{!! $faq->faq_content !!}</td>
                                  @if( $faq->faq_status == 1)
                                  <td><center> Publish</center></td>
                                  @else
                                  <td><center> Drafted</center></td>
                                  @endif
                                  <td>
                                      @if(!Auth::guest())
                                          <a href="{{ url('/admin/faq/showFaq/'.$faq->id) }}" class="btn btn-primary btn-flat ">View</a>
                                          <a href="{{ url('/admin/faq/editFaq/'.$faq->id) }}" class="btn btn-warning btn-flat ">Edit</a>
                                          <a href="{{ url('/admin/faq/deleteFaq/'.$faq->id) }}" class="btn btn-danger btn-flat ">Delete</a>
                                      @endif
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$faqs->links()}}
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop

