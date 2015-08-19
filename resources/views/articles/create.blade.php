@extends('layout.master')
@section('title')
	Create Article
@stop
@section('content')
	<div class="col-md-8 col-md-offset-2">
		<h2>Create new article</h2>
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
		{!! Form::open(array('route' => 'articles.store', 'method' => 'POST')) !!}
			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label"> 
				{!! Form::label('title','Title', [
					'class' => 'mdl-textfield__label'
				]) !!}
				{!! Form::text('title', null, [
					'id' => 'title', 
					'class' => 'mdl-textfield__input', 
					'required' => 'true',
					'autocomplete' => 'off'
				]) !!}
			</div>
			<br>
			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label"> 
				{!! Form::label('tag','Tags', [
					'class' => 'mdl-textfield__label'
				]) !!}
				{!! Form::text('tag', null, [
					'id' => 'tag', 
					'class' => 'mdl-textfield__input', 
					'required' => 'true',
					'autocomplete' => 'off'
				]) !!}
			</div>
			<br>
			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label"> 
				{!! Form::label('content','Content', [
					'class' => 'mdl-textfield__label'
				]) !!}
				{!! Form::textarea('content', null, [
					'row' => '7',
					'id' => 'content', 
					'class' => 'mdl-textfield__input', 
					'required' => 'true',
				]) !!}
			</div>
			<div class="form-group"> 
				<div style="display: inline"> 
					{!! Form::submit('Create',[
						'class' => 'btn btn-primary'
					]) !!}
					<a class="btn btn-default" href="{{ route('home') }}" role="button">Cancel</a>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
@stop