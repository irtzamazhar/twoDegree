@extends('admin.layouts.dashboard')
@section('content')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
           </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-yellow" style="margin-bottom: -20px;">
                <div class="inner">
                  <h3>{{ $countNewsletter }}</h3>
                  <p>New Registred Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ url('/admin/newsletter') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-aqua " style="margin-bottom: -20px;">
                <div class="inner">
                  <h3>{{ $countContact }}</h3>
                  <p>New Contact Inquiries</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('/admin/contact') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-green" style="margin-bottom: -20px;">
                <div class="inner">
                  <h3>{{ $countBlog }}</h3>
                  <p>All Blog Posts</p>
                </div>
                <div class="icon">
                  <i class="fa fa-coffee"></i>
                </div>
                <a href="{{ url('/admin/blog') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-red" style="margin-bottom: -20px;">
                <div class="inner">
                  <h3>{{ $countSiteEvent }}</h3>
                  <p>Upcoming Events</p>
                </div>
                <div class="icon">
                  <i class="fa fa-files-o"></i>
                </div>
                <a href="{{ url('/admin/event') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <!-- <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div> --><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
<!--           <div class="col-lg-12 connectedSortable">
            <section>
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                  <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                </ul>
                <div class="tab-content no-padding">
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                </div>
              </div>

            </section>
          </div> -->

        </section><!-- /.content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 4.0</td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 5.0</td>
                        <td>Win 95+</td>
                        <td>5</td>
                        <td>C</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 5.5</td>
                        <td>Win 95+</td>
                        <td>5.5</td>
                        <td>A</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet
                          Explorer 6</td>
                        <td>Win 98+</td>
                        <td>6</td>
                        <td>A</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet Explorer 7</td>
                        <td>Win XP SP2+</td>
                        <td>7</td>
                        <td>A</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>AOL browser (AOL desktop)</td>
                        <td>Win XP</td>
                        <td>6</td>
                        <td>A</td>
                      </tr>
                    </tbody>
                    <!-- <tfoot>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                      </tr>
                    </tfoot> -->
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </section>
      </div>
@stop