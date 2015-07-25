@extends('layout.master')
@section('title')
	Login
@stop

@section('content')
	<div class="panel-body">
	<h2>Login</h2>
	<br>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(['route' => 'auth.login.get', 'method' => 'POST', 'class' => 'form-horizontal', 'style' => 'display: block;']) !!}
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
				{!! Form::text('email',old('email'), ['id' => 'email', 'class' => 'form-control', 'required' => 'true', 'placeholder' => 'Email address']) !!}
			</div>				
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
				{!! Form::password('password',['id' => 'password', 'class' => 'form-control', 'required' => 'true', 'placeholder' => 'Password']) !!}
			</div>
		</div>
		<div class="form-group checkbox">
			<label>
				<input name="remember" type="checkbox" value="Remember me">Remember me
			</label>
		</div>
		<div class="col-xs-5 col-xs-offset-3">
			<div class="form-group"> 
				{!! Form::submit('Sign in',array('class' => 'form-control btn btn-primary')) !!}	
			</div>
		</div>
	{!! Form::close() !!}
	</div>

@stop