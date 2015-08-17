@extends('layout.master')
@section('title')
	Login
@stop

@section('content')
	<div class="col-md-6 col-md-offset-3">
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
	{!! Form::open([
		'route' => 'auth.login.get',
		'method' => 'POST', 
		'class' => 'form-horizontal', 
		'style' => 'display: block;']
	) !!}
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
			{!! Form::text('email',old('email'), [
				'id' => 'email', 
				'class' => 'mdl-textfield__input', 
				'required' => 'true', 
				'autocomplete' => 'off'
			]) !!}
			<label class="mdl-textfield__label" for="email">Email</label>
		</div>	
		<br>	
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">			
			{!! Form::password('password',[
				'id' => 'password', 
				'class' => 'mdl-textfield__input', 
				'required' => 'true',
				'autocomplete' => 'off'
			]) !!}
			<label class="mdl-textfield__label" for="password">Password</label>
		</div>

		<div class="form-group checkbox">
			<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
			  <input type="checkbox" name="remember" id="remember" class="mdl-checkbox__input" checked />
			  <span class="mdl-checkbox__label">Remember me</span>
			</label>
		</div>
		<div class="col-xs-5 col-xs-offset-2">
			<div class="form-group"> 
				{!! Form::submit('Sign in',[
					'class' => 'loginbutton mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent'
				]) !!}	
			</div>
		</div>
	{!! Form::close() !!}
	</div>
	</div>
@stop