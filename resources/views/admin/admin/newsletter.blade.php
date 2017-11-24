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
        <section class="invoice">
            <div>
                <div class="box-header">
                    <h3 class="box-title">All Subscriber's Email</h3>
                </div>
                <div class="box-body">
                    @if(count($newsletters) > 0)
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>User E-mail</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i = 1 @endphp
                      @foreach($newsletters as $newsletter)
                      <tr>
                          <td><?= $i ?></td>
                          <td>{{ $newsletter->email }}</td>
                      </tr>
                      @php $i++ @endphp
                      @endforeach
                    </tbody>
                  </table>
                    {{ $newsletters->links() }}
                    @else
                        <h2>No Contact Inquiries Yet.</h2>
                    @endif
                </div>
              </div>
          
        </section>
      </div><!-- /.content-wrapper -->
      @stop