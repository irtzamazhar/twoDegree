@extends('admin.layouts.dashboard')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Admin Profile</h3>
                    </div>
                    
                    {!!Form::model($user,['route'=>['update',$user->id],'method'=>'POST','files'=>true])!!}
                    @include('admin.admin.message')
                        <div class="box-body ">
                            <div class="row">
                                <div class="form-group col-xs-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    {!!Form::label('name','Name',['class'=>'control-label'])!!}
                                    {!!Form::text('name',null,['class'=>'form-control'])!!}
                                    <span class="help-block">{!!$errors->has('name') ? $errors->first('name'):''!!}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!!Form::label('email','Email',['class'=>'control-label'])!!}
                                    {!!Form::email('email',null,['class'=>'form-control'])!!}
                                    <span class="help-block">{!!$errors->has('email')?$errors->first('email'):''!!}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-3 {{ $errors->has('pass') ? ' has-error' : '' }}">
                                    {!!Form::label('pass','Password',['class'=>'control-label'])!!}
                                    {!!Form::password('pass',array('placeholder'=>'Password', 'class'=>'form-control' ))!!}
                                    <span class="help-block">{!!$errors->has('pass')?$errors->first('pass'):''!!}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-3 {{ $errors->has('cpass') ? ' has-error' : '' }}">
                                    {!!Form::label('cpass','Confirm assword',['class'=>'control-label '])!!}
                                    {!!Form::password('cpass',array('placeholder'=>'Confirm Password', 'class'=>'form-control' ))!!}
                                    <span class="help-block">{!!$errors->has('cpass')?$errors->first('cpass'):''!!}</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                {!!Form::label('image','Image',['class'=>'control-label'])!!}
                                {!!Form::file('image',null,['class'=>'form-control'])!!}
                                <span class="help-block">{!!$errors->has('image')?$errors->first('image'):''!!}</span>
                                <br>
                                <td>{!! Html::image("storage/app/public/thumbnail/$user->image",'alt') !!}</td>
                            </div>
                            <div>
                                {!! Form::submit('Update',['class'=>'btn btn-primary btn-md  btn-flat'])!!}
                            </div>
                        </div>
                    {!!Form::close()!!}  
                </div>
            </div>
        </div>
    </section>
</div>
@stop