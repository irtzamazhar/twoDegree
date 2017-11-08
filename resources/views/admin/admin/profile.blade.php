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
		                </div><!-- /.box-header -->
                <!-- form start -->
		                 {!!Form::model($blog,['route'=>['update',$blog->id],'method'=>'POST','files'=>true])!!}
		                 {{ csrf_field() }}
		                  <div class="box-body ">
		                  	<div class="row">
		                  		<div class="form-group col-xs-3">
			                        {!!Form::label('name','Name',['class'=>'control-label'])!!}
			                        {!!Form::text('name',null,['class'=>'form-control'])!!}
									{!!$errors->has('name')?$errors->first('name'):''!!}
			                    </div>
		                  	</div>
		                  	<div class="row">
		                  		<div class="form-group col-xs-3">
			                        {!!Form::label('email','Email',['class'=>'control-label'])!!}
			                        {!!Form::email('email',null,['class'=>'form-control'])!!}
									{!!$errors->has('email')?$errors->first('email'):''!!}
			                    </div>
		                  	</div>
		                    <div class="row">
		                		<div class="form-group col-xs-3">
			                        {!!Form::label('pass','Password',['class'=>'control-label'])!!}
		                        	{!!Form::password('pass',array('placeholder'=>'Password', 'class'=>'form-control' ))!!}
									{!!$errors->has('pass')?$errors->first('pass'):''!!}
			                    </div>
		                	</div>
		                	<div class="row">
		                		<div class="form-group col-xs-3">
			                    	{!!Form::label('cpass','Confirm assword',['class'=>'control-label '])!!}
		                    		{!!Form::password('cpass',array('placeholder'=>'Confirm Password', 'class'=>'form-control' ))!!}
									{!!$errors->has('cpass')?$errors->first('cpass'):''!!}
			                    </div>
		                	</div>
		                    <div class="form-group">
		                        {!!Form::label('image','Image',['class'=>'control-label'])!!}
		                        {!!Form::file('image',null,['class'=>'form-control'])!!}
								{!!$errors->has('image')?$errors->first('image'):''!!}
								<br>
								<td>{!! Html::image("storage/app/public/thumbnail/$blog->image",'alt') !!}</td>
		                    </div>
		                    <div >
			                    {!! Form::submit('Update',['class'=>'btn btn-primary btn-md  btn-flat'])!!}
			                </div>
		                  </div><!-- /.box-body -->
		                  {!!Form::close()!!}  
        			</div>
        		</div>
        	</div>
        </section>
     </div><!-- /.content-wrapper -->
@stop