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
        <section class="invoice">
            <div>
                <div class="box-header">
                    <a class="btn btn-primary btn-flat btn-md pull-left" href="{{ url('admin/contact/addBanner') }}">Contact Banner</a>
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
                                      <td>
                                        @php $truncated = str_limit( $contact->subject , 15); @endphp
                                        {!! $truncated !!}
                                      </td>
                                      <td>
                                        @php $truncated = str_limit( $contact->message , 20); @endphp
                                        {!! $truncated !!}
                                      </td>
                                      <td>
                                          @if(!Auth::guest())
                                              <a href="{{ url('/admin/contact/showContact/'.$contact->id) }}" class="btn btn-primary btn-flat">View</a>
                                              <a href="{{ url('/admin/contact/delete/'.$contact->id) }}" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure?')">Delete</a>
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
        </section>
      </div><!-- /.content-wrapper -->
      @stop