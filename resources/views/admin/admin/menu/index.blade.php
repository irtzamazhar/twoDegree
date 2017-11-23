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
              <div class="box menu-holder">
                <div class="box-header">
                </div>
                @include('admin.admin.message')
                <div class="box-body">
                    <div id="my_div">
                        <div class="col-md-6">
                            <div class="column left first page-listing">
                                <h1>Page Listing</h1>
                                <ul class="sortable-list ui-sortable dragable-data box" id="page">
                                    @php $a = 1 @endphp
                                    @foreach($pages as $page)
                                        <li class="my_div sortable-item" data-pageurl="{{ $page->page_url }}" data-menuname="{{ $page->page_title }}" id="page_<?= $a ?>">
                                            <i class="fa fa-bars" style="margin-right: 5px;" aria-hidden="true"></i>
                                            {{ $page->page_title }}
                                        </li>
                                    @php $a++ @endphp
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="column left first page-listing">
                                <h1>Sections Listing</h1>
                                <ul class="sortable-list ui-sortable dragable-data box" id="section">
                                    @php $b = 1 @endphp
                                    @foreach($sections as $section)
                                        <li class="my_div sortable-item" data-pageurl="{{ $section->section_path }}" data-menuname="{{ $section->section_name }}" id="page_<?= $b ?>">
                                            <i class="fa fa-bars" style="margin-right: 5px;" aria-hidden="true"></i>
                                            {{ $section->section_name }}
                                        </li>
                                    @php $b++ @endphp
                                    @endforeach
                                </ul>
                            </div>                        
                        </div>

                        <div class="col-md-6">
                            <div class="column left first my_style">
                                <h1>Header Section</h1>
                                <ul class="sortable-list sortable2 ui-sortable box" id="header">
                                    @php $c = 1 @endphp
                                    @foreach($headerMenu as $hm)
                                        <li class="sortable-item" data-pageurl="{{ $hm->page_url }}" data-menuname="{{ $hm->page_name }}" id="headermenu_<?= $c ?>">
                                            <i class="fa fa-bars" style="margin-right: 5px;" aria-hidden="true"></i>
                                            {{ $hm->page_name }}
                                            <button type="submit" class="close close-item">&times;</button>
                                            <div style="display: none;" id="page-url">{{ $hm->page_url }}</div>
                                        </li>
                                    @php $c++ @endphp
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="column left first my_style">
                                <h1>Footer Section</h1>
                                <ul class="sortable-list sortable2 ui-sortable box" id="footer">
                                    @php $d = 1 @endphp
                                    @foreach($footerMenu as $fm)
                                        <li class="sortable-item" data-pageurl="{{ $fm->page_url }}" data-menuname="{{ $fm->page_name }}" id="footermenu_<?= $d ?>">
                                            <i class="fa fa-bars" style="margin-right: 5px;" aria-hidden="true"></i>
                                            {{ $fm->page_name }}
                                            <button type="submit" class="close close-item">&times;</button>
                                            <div style="display: none;" id="page-url">{{ $fm->page_url }}</div>
                                        </li>
                                    @php $d++ @endphp
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-flat btn-md pull-right" id="submit-btn">Submit</button>
              </div>
            </div>
          </div>
        </section>
          
      </div><!-- /.content-wrapper -->
      @stop

