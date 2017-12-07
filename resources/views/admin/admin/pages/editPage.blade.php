@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Pages
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pages</li>
          </ol>
        </section>
        
        <section class="invoice">
            <div>
                <div class="box-header">
                    <h3 class="box-title">Edit Page</h3>
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <form action="{{ action('PagesController@update', $page->id) }}" method="post" id="blogpost" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-xs-6 {{ $errors->has('page_url') ? ' has-error' : '' }}">
                                <label for="pageUrl">Page URL</label>
                                <input type="text" class="form-control" value="{{ $page->page_url }}" id="page_url" name="page_url" placeholder="Enter Page Url">
                                @if($errors->has('page_url'))
                                    <span class="help-block">{{ $errors->first('page_url') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-6 {{ $errors->has('page_title') ? ' has-error' : '' }}">
                                <label for="pageTitle">Page Title</label>
                                <input type="text" class="form-control" value="{{ $page->page_title }}" id="page_title" name="page_title" placeholder="Enter Page Title">
                                @if($errors->has('page_title'))
                                    <span class="help-block">{{ $errors->first('page_title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-10 {{ $errors->has('page-image') ? ' has-error' : '' }}">
                                <label for="pageImage">Page Image</label>
                                <input type="file" class="form-control" value="{{ old('page-image') }}" id="page-image" name="page-image">
                                @if($errors->has('page-image'))
                                    <span class="help-block">{{ $errors->first('page-image') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-2">
                                <td>
                                    <img src="{{ asset('storage/app/public/images/'.$page->page_image) }}" alt="alt" width="144" height="70">
                                </td>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 {{ $errors->has('page_content') ? ' has-error' : '' }}">
                                <label for="PageBody">Page Content</label>
                                <textarea placeholder="Enter Page Body..." id="editor1" rows="10" name="page_content" class="form-control" value="" >{!! $page->page_content !!}</textarea>
                                @if($errors->has('page_content'))
                                    <span class="help-block">{{ $errors->first('page_content') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="submit" value="Post" class="form-group btn btn-success btn-flat btn-md pull-right">
                                <a href="{{ url('admin/pages') }}" class="btn btn-primary btn-md btn-flat">Go Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </section>
      </div><!-- /.content-wrapper -->
      <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
      
      @stop