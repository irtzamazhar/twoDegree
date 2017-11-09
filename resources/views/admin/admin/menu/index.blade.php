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
                    
<!--                    <div id="no-drop" class="draggable drag-drop"> #no-drop </div>

                    <div id="yes-drop" class="draggable drag-drop"> #yes-drop </div>

                    <div id="outer-dropzone" class="dropzone">
                        #outer-dropzone
                        <div id="inner-dropzone" class="dropzone">#inner-dropzone</div>
                    </div>-->
                    
                    <div class="ui-widget-content dragable-data" id="draggable">
                        @foreach($pages as $page)
                            <p class="my_div ">{{ $page->page_title }}</p>
                            <div style="display: none;">{{ $page->page_url }}</div>
                        @endforeach
                    </div>

                    <div class="ui-widget-header my_style droppable" >
                        <p>Header Section</p>
                    </div>
<!--<div id="pos"></div>-->
                    <div class="ui-widget-header my_style droppable">
                        <p>Footer Section</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop

