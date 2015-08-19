@extends('layout.master')
@section('title')
	Edit Article
@stop
@section('content')
	<div class="col-md-8 col-md-offset-2">
		<h2>Edit article</h2>
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
		{!! Form::model($article,array(
				'route' => array('articles.update', $article->id),
				'method' => 'PUT'
				)
			) 
		!!}
			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label"> 
				{!! Form::label('title','Title', [
					'class' => 'mdl-textfield__label'
				]) !!}
				{!! Form::text('title', null, [
					'id' => 'title', 
					'class' => 'mdl-textfield__input', 
					'required' => 'true'
				]) !!}
			</div>
			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label"> 
				{!! Form::label('tag','Tags', [
					'class' => 'mdl-textfield__label'
				]) !!}
				{!! Form::text('tag', $article->tag->first()->tag, [
					'id' => 'tag', 
					'class' => 'mdl-textfield__input', 
					'required' => 'true'
				]) !!}
			</div>

			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label"> 
				{!! Form::label('content','Content',[
					'class' => 'mdl-textfield__label'
				]) !!}
				{!! Form::textarea('content', null, [
					'row' => '7',
					'id' => 'content', 
					'class' => 'mdl-textfield__input', 
					'required' => 'true'
				]) !!}
			</div>
			<div class="fixedinput mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="display: inline">
				<input type="submit" name="submit" value="Edit" class="btn btn-primary">
				<a class="btn btn-default" href="{{ route('home') }}" role="button">Cancel</a>	
			</div>
		{!! Form::close() !!}
	<div>
@stop