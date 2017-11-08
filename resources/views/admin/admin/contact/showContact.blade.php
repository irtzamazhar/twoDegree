@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Contact Inquiries
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Contact Inquiries</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <a href="mailto:{{ $contact->email }}?Subject=Contact%20Inquiry" class="btn btn-success btn-lg btn-flat pull-right" target="_top">Reply</a>
                </div>
                <div class="box-body">
                    <div class="fname">
                        <h4>First Name:</h4>
                        <div>{{ $contact->fname }}</div>
                    </div>
                    <div class="lname">
                        <h4>Last Name:</h4>
                        <div>{{ $contact->lname }}</div>
                    </div>
                    <div class="email">
                        <h4>Email:</h4>
                        <div>{{ $contact->email }}</div>
                    </div>
                    <div class="subject">
                        <h4>Subject:</h4>
                        <div>{{ $contact->subject }}</div>
                    </div>
                    <div class="message">
                        <h4>Message:</h4>
                        <div>{{ $contact->message }}</div>
                    </div>
                    @if(!Auth::guest())
                        <a href="{{ url('/admin/contact/delete/'.$contact->id) }}" class="btn btn-danger btn-flat">Delete</a>
                    @endif
                    <a href="{{ url('admin/contact') }}" class="btn btn-primary btn-lg btn-flat pull-right">Go Back</a>
                </div>
              </div>
            </div>
          </div>
          
        </section>
      </div><!-- /.content-wrapper -->
      @stop

