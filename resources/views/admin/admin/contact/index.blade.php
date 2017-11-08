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
            <li class="active">Contact Inquiries</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    @if(count($contacts) > 0)
                        <table id="example1" class="table table-bordered table-striped" style="table-layout: fixed;">
                            <thead>
                              <tr>
                                  <!--<th width="15%">#</th>-->
                                <th width="15%">First Name</th>
                                <th width="15%">Last Name</th>
                                <th width="15%">E-mail</th>
                                <th width="15%">Subject</th>
                                <th width="15%">Message</th>
                                <th width="20%">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <!--<td>{{ $contact->id }}</td>-->
                                      <td>{{ $contact->fname }}</td>
                                      <td>{{ $contact->lname }}</td>
                                      <td>{{ $contact->email }}</td>
                                      <td>{{ $contact->subject }}</td>
                                      <td style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">{{ $contact->message }}</td>
                                      <td>
                                          @if(!Auth::guest())
                                              <a href="{{ url('/admin/contact/showContact/'.$contact->id) }}" class="btn btn-primary btn-flat">View</a>
                                              <a href="{{ url('/admin/contact/delete/'.$contact->id) }}" class="btn btn-danger btn-flat">Delete</a>
                                          @endif
                                      </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$contacts->links()}}
                    @else
                        <h2>No Contact Inquiries Yet.</h2>
                    @endif
                </div>
              </div>
            </div>
          </div>
          
        </section>
      </div><!-- /.content-wrapper -->
      @stop