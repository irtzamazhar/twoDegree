@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage HomePage
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">HomePage</li>
          </ol>
        </section>
        
        <section class="invoice">
            <div>
                <div class="box-header">
                    <h3 class="box-title">Edit Page Section</h3>
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <form action="{{ action('HomePageController@update', $section->id) }}" method="post" id="blogpost" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-xs-12{{ $errors->has('section-name') ? ' has-error' : '' }}">
                                <label for="sectionName">Section Name</label>
                                <input type="text" class="form-control" value="{{ $section->section_name }}" id="section-name" name="section-name" placeholder="Enter Section Name">
                                @if($errors->has('section-name'))
                                    <span class="help-block">{{ $errors->first('section-name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-8 {{ $errors->has('section-image') ? ' has-error' : '' }}">
                                <label for="pageImage">Section Image</label>
                                <input type="file" class="form-control" value="{{ old('section-image') }}" id="section-image" name="section-image">
                                @if($errors->has('section-image'))
                                    <span class="help-block">{{ $errors->first('section-image') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-4">
                                <td>
                                    <img src="{{ asset('storage/app/public/images/'.$section->section_image) }}" alt="alt" width="318" height="180">
                                </td>
                            </div>
                            <div class="form-group col-xs-12 {{ $errors->has('section-ontent') ? ' has-error' : '' }}">
                                <label for="sectionContent">Section Content</label>
                                <textarea placeholder="Enter Section Content..." id="editor1" rows="10" name="section-content" class="form-control">{{ $section->section_content }}</textarea>
                                @if($errors->has('section-content'))
                                    <span class="help-block">{{ $errors->first('section-content') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-12">
                                <input type="submit" value="Post" class="form-group btn btn-success btn-flat pull-right btn-md">
                                <a href="{{ url('admin/home') }}" class="btn btn-primary btn-md btn-flat ">Go Back</a>
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