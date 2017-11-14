@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Menu
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Manage Menu</li>
          </ol>
        </section>
        
        <section>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div>
                  @include('admin.admin.message')
                <div class="box-body">                    
                    <ul class="ui-widget-content dragable-data" id="draggable">
                        @foreach($pages as $page)
                            <li class="my_div dragItem"  id="" data-menuname="{{ $page->page_title }}">
                                <i class="fa fa-bars" style="margin-right: 5px;" aria-hidden="true"></i>
                                {{ $page->page_title }}
                                <div style="display: none;" id="page-url">{{ $page->page_url }}</div>
                            </li>
                        @endforeach
                    </ul>
                    
                    <form action="{{ route('insertData1') }}" method="post" id="page-menu" >
                        <div class="ui-widget-header my_style droppable" id="myheader-menu" >
                            <p>Header Section</p>
                            @foreach($headerMenu as $hm)
                                <li class="my_div dragItem"  id="" data-menuname="{{ $hm->page_name }}">
                                    <i class="fa fa-bars" style="margin-right: 5px;" aria-hidden="true"></i>
                                    {{ $hm->page_name }}
                                    <div style="display: none;" id="page-url">{{ $hm->page_url }}</div>
                                </li>
                            @endforeach
                        </div>

                        <div class="ui-widget-header my_style droppable" id="myfooter-menu">
                            <p>Footer Section</p>
                            @foreach($footerMenu as $fm)
                                <li class="my_div dragItem">
                                    <i class="fa fa-bars" style="margin-right: 5px;" aria-hidden="true"></i>
                                    {{ $fm->page_name }}
                                    <div style="display: none;" id="page-url">{{ $fm->page_url }}</div>
                                </li>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success btn-flat btn-lg pull-right" id="submit">Submit</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop

