@extends('layout.master')
@section('title')
	Edit Article
@stop
@section('content')
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
			'method' => 'PUT',
			'class' => 'form-horizontal'
			)
		) 
	!!}
		<div class="form-group"> 
			{!! Form::label('title','Title', array('class' => 'col-sm-2')) !!}
			{!! Form::text('title', null, array('id' => 'title', 'class' => 'form-control', 'required' => 'true', 'placeholder' => 'Fill your title')) !!}
		</div>
		<div class="form-group"> 
			{!! Form::label('tag','Tags', array('class' => 'col-sm-2')) !!}
			{!! Form::text('tag', $article->tag->first()->tag, array('id' => 'tag', 'class' => 'form-control', 'required' => 'true', 'placeholder' => 'Fill your tag')) !!}
		</div>

		<div class="form-group"> 
			{!! Form::label('content','Content', array('class' => 'col-sm-2')) !!}
			{!! Form::textarea('content', null, array('row' => '7','id' => 'content', 'class' => 'form-control', 'required' => 'true', 'placeholder' => 'Fill your content')) !!}
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Edit" class="btn btn-primary">
			<a class="btn btn-default" href="{{ route('home') }}" role="button">Cancel</a>	
		</div>
	{!! Form::close() !!}

@stop