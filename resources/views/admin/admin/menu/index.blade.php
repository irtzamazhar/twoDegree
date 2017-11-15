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
                    <div class="col-md-6">
                        <div class="page-listing">
                            <h2>Page Listing</h2>
                            <ul id="sortable1" class="droptrue dragable-data">
                                @foreach($pages as $page)
                                    <li class="my_div dragItem ui-state-default" data-menuname="{{ $page->page_title }}" data-pageurl="{{ $page->page_url }}">
                                        <i class="fa fa-bars" style="margin-right: 5px;" aria-hidden="true"></i>
                                        {{ $page->page_title }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="section-listing">
                            <h2>Sections Listing</h2>
                            <ul id="origin" class="drag after_drop droptrue dragable-data">
                                @foreach($sections as $section)
                                    <li class="my_div dragItem ui-state-default drag_li_listing" data-menuname="{{ $section->section_name }}" data-pageurl="{{ $section->section_path }}">
                                        <i class="fa fa-bars" style="margin-right: 5px;" aria-hidden="true"></i>
                                        {{ $section->section_name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>                        
                    </div>

                    <div class="col-md-6">
                        <form action="{{ route('insertData1') }}" method="post" id="page-menu" >
                            <div class="ui-widget-header my_style droppable" id="myheader-menu" >
                                <ul class="droppable" id="dropable_list">Header Section
                                @foreach($headerMenu as $hm)
                                    <li class="my_div dragItem drag_li_listing dragable" data-menuname="{{ $hm->page_name }}">
                                        <i class="fa fa-bars" style="margin-right: 5px;" aria-hidden="true"></i>
                                        {{ $hm->page_name }}
                                        <div style="display: none;" id="page-url">{{ $hm->page_url }}</div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>

                            <div class="ui-widget-header my_style droppable" id="myfooter-menu">
                                <ul class="dropfalse" id="sortable5">Footer Section</ul>
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
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop

