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
        <section class="invoice">
            <div>
                <div class="box-header">
                    <a href="mailto:{{ $contact->email }}?Subject=Contact%20Inquiry" class="btn btn-success btn-md btn-flat pull-right" target="_top">Reply</a>
                </div>
                <table class="table table-striped view-any">
                    <tbody>
                        <tr>
                            <th style="width:10%">First Name:</th>
                            <td>{{ $contact->fname }}</td>
                        </tr>
                        <tr>
                            <th>Last Name:</th>
                            <td>{{ $contact->lname }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>Subject:</th>
                            <td>{{ $contact->subject }}</td>
                        </tr>
                        <tr>
                            <th>Message:</th>
                            <td>{{ $contact->message }}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                @if(!Auth::guest())
                                    <a href="{{ url('/admin/contact/delete/'.$contact->id) }}" class="btn btn-danger btn-flat pull-right" onclick="return confirm('Are you sure?')">Delete</a>
                                @endif
                                <a href="{{ url('admin/contact') }}" class="btn btn-primary btn-md btn-flat ">Go Back</a>
                            </td>
                        </tr>
                    </tbody>
                  </table>
              </div>

          
        </section>
      </div><!-- /.content-wrapper -->
      @stop

