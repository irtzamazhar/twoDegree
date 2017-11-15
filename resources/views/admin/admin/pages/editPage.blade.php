@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Page
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pages</li>
          </ol>
        </section>
        
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <form action="{{ action('PagesController@update', $page->id) }}" method="post" id="blogpost" enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                        <div class="form-group col-xs-4 {{ $errors->has('page-image') ? ' has-error' : '' }}">
                            <label for="pageImage">Page Image</label>
                            <input type="file" class="form-control" value="{{ old('page-image') }}" id="page-image" name="page-image">
                            @if($errors->has('page-image'))
                                <span class="help-block">{{ $errors->first('page-image') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-xs-2">
                            <td>
                                <img src="{{ asset('storage/app/public/images/'.$page->page_image) }}" alt="alt" width="160" height="70">
                            </td>
                        </div>
                        <div class="form-group col-xs-6 {{ $errors->has('page_status') ? ' has-error' : '' }}">
                            <label for="pageStatus">Page Status</label>
                            @if($page->page_status == 1)
                            <select class="form-control" id="page_status" name="page_status">
                                <option value="">~~Status~~</option>
                                <option value="1" selected="">Publish</option>
                                <option value="0">Drafted</option>
                            </select>
                            @else
                            <select class="form-control" id="page_status" name="page_status">
                                <option value="">~~Status~~</option>
                                <option value="1">Publish</option>
                                <option value="0" selected="">Drafted</option>
                            </select>
                            @endif
                            @if($errors->has('page_status'))
                                <span class="help-block">{{ $errors->first('page_status') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-xs-12 {{ $errors->has('page_content') ? ' has-error' : '' }}">
                            <label for="PageBody">Page Content</label>
                            <textarea placeholder="Enter Page Body..." id="editor1" rows="10" name="page_content" class="form-control" value="" >{{ $page->page_content }}</textarea>
                            @if($errors->has('page_content'))
                                <span class="help-block">{{ $errors->first('page_content') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-xs-12">
                            <input type="submit" value="Post" class="form-group btn btn-success btn-flat btn-lg">
                            <a href="{{ url('admin/pages') }}" class="btn btn-primary btn-lg btn-flat pull-right">Go Back</a>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          
      </div><!-- /.content-wrapper -->
      <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
      
      @stop