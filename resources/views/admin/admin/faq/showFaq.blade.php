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
                    <h3 class="box-title">View FAQ</h3>
                </div>
                  @include('admin.admin.message')
                  <table class="table table-striped view-any">
                    <tbody>
                        <tr>
                            <th>Title:</th>
                            <td><h1>{{ $faq->faq_title }}</h1></td>
                        </tr>
                        <tr>
                            <th>Content:</th>
                            <td>{!! $faq->faq_content !!}</td>
                        </tr>
                    </tbody>
                  </table>
                  @if(!Auth::guest())
                      <a href="{{ url('/admin/faq/editFaq/'.$faq->id) }}" class="btn btn-warning pull-right btn-flat">Edit</a>
                      <a href="{{ url('/admin/faq/deleteFaq/'.$faq->id) }}" class="btn pull-right btn-dlt btn-danger btn-flat" onclick="return confirm('Are you sure?')">Delete</a>
                  @endif
                  <a href="{{ url('admin/faq') }}" class="btn btn-primary btn-md btn-flat">Go Back</a>
            </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop