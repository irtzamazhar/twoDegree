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
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $countNewsletter }}</h3>
                  <p>Subscribe Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ url('/admin/newsletter') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua ">
                <div class="inner">
                  <h3>{{ $countContact }}</h3>
                  <p>All Contact Inquiries</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('/admin/contact') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
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
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{ $countSiteEvent }}</h3>
                  <p>Upcoming Events</p>
                </div>
                <div class="icon">
                  <i class="fa fa-calendar"></i>
                </div>
                <a href="{{ url('/admin/event') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          
          <div class="row">
              <section class="col-xs-12">
                  <div class="app">
                      <!--<a href="#">Here</a>-->
                      <div class="dropdown pull-right">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-bars" style="margin-right: 5px;"></i></button>
                        <ul class="dropdown-menu">
                          <li><a id="yearly" style="cursor: pointer;">Yearly</a></li>
                          <li><a id="monthly" style="cursor: pointer;">Monthly</a></li>
                          <li><a id="daily" style="cursor: pointer;">Daily</a></li>
                        </ul>
                      </div>
                    <center>
                        <div id="m">{!! $monthChart->html() !!}</div>
                        <div id="y" style="display: none;">{!! $yearChart->html() !!}</div>
                        <div id="d" style="display: none;">{!! $dayChart->html() !!}</div>
                    </center>
                  </div>
              </section>
          </div>
        </section>
      </div>
    {!! Charts::scripts() !!}
    {!! $monthChart->script() !!}
    {!! $yearChart->script() !!}
    {!! $dayChart->script() !!}
@stop