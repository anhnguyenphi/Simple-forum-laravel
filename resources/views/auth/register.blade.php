@extends('layout.master')
@section('title')
	Register
@stop

@section('content')
	<div class="col-md-8 col-md-offset-2">
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
		{!! Form::open(['route' => 'auth.register.post', 'method' => 'POST']) !!}
			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label"> 
				{!! Form::label('name','Name',[
					'class' => 'mdl-textfield__label'
				]) !!}
				{!! Form::text('name',old('name'), [
					'id' => 'name', 
					'class' => 'mdl-textfield__input', 
					'required' => 'true',
					'autocomplete' => 'off'
				]) !!}
			</div>
			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				{!! Form::label('email','Email', [
					'class' => 'mdl-textfield__label'					
				]) !!}
				{!! Form::text('email',old('email'), [
					'id' => 'email', 
					'class' => 'mdl-textfield__input', 
					'required' => 'true', 
					'autocomplete' => 'off'
				]) !!}
			</div>
			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				{!! Form::label('password','Password', [
					'class' => 'mdl-textfield__label'
				]) !!}
				{!! Form::password('password',[
					'id' => 'password', 
					'class' => 'mdl-textfield__input', 
					'required' => 'true', 
				]) !!}
			</div>
			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				{!! Form::label('password_confirmation','Confrim password', [
					'class' => 'mdl-textfield__label'
				]) !!}
				{!! Form::password('password_confirmation',[
					'id' => 'name', 
					'class' => 'mdl-textfield__input', 
					'required' => 'true', 
				]) !!}
			</div>
			<div class="form-group"> 
				<div style="display: inline"> 
					{!! Form::submit('Register',[
						'class' => 'mdl-button mdl-js-button mdl-button--primary mdl-js-ripple-effect'
					]) !!}
					<a class="mdl-button mdl-js-button mdl-js-ripple-effect" href="{{ route('home') }}" role="button">Cancel</a>
				</div>
			</div>

		{!! Form::close() !!}
	</div>
@stop