@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Newsletter
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Newsletter</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body">
                    @if(count($newsletters) > 0)
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th><center> User E-mail</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($newsletters as $newsletter)
                      <tr>
                          <td><center> {{ $newsletter->email }}</center></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                    {{ $newsletters->links() }}
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