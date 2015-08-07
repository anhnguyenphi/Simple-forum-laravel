@extends('layout.master')
@section('title')
	Register
@stop

@section('content')

	<h2>Register</h2>
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
	{!! Form::open(['route' => 'auth.register.post', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
		<div class="form-group">
			{!! Form::label('name','Name') !!}
			{!! Form::text('name',old('name'), [
				'id' => 'name', 
				'class' => 'form-control', 
				'required' => 'true', 
				'placeholder' => 'Fill your name',
				'autocomplete' => 'off'
			]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Email') !!}
			{!! Form::text('email',old('email'), [
				'id' => 'email', 
				'class' => 'form-control', 
				'required' => 'true', 
				'placeholder' => 'Fill your email',
				'autocomplete' => 'off'
			]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password','Password') !!}
			{!! Form::password('password',[
				'id' => 'password', 
				'class' => 'form-control', 
				'required' => 'true', 
				'placeholder' => 'Fill your password'
			]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation','Confrim password') !!}
			{!! Form::password('password_confirmation',[
				'id' => 'name', 
				'class' => 'form-control', 
				'required' => 'true', 
				'placeholder' => 'Fill your name'
			]) !!}
		</div>
		<div class="form-group"> 
			{!! Form::submit('Register',[
				'class' => 'btn btn-primary'
			]) !!}
			<a class="btn btn-default" href="{{ route('home') }}" role="button">Cancel</a>	
		</div>
	{!! Form::close() !!}

@stop