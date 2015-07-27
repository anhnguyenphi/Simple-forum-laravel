@extends('layout.master')
@section('title')
{{ $article->title }}
@stop
@section('content')
	<div style="word-wrap: break-word">
		<div class="row">
			<ul class="list-inline">
				<li>
					<span class="glyphicon glyphicon-chevron-left"></span>
					<a href="{{ route('home') }}">Back to home</a>	
				</li>
				@if (Auth::check())
			  	<li>
			  		<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-default btn-mini" role="button">Edit</a>
			  	</li>
			  	<li>
			  		{!! Form::open([
			  			'route' => ['articles.destroy', $article->id],
			  			'method' => 'DELETE',
			  		]) !!}
						<button type="submit" class="btn btn-default btn-mini">Delete</button>  		
			  		{!! Form::close() !!}
			  	</li>
			  	@endif
			</ul>
		</div>
		<div class="row">
			<h2>{{ $article->title }}</h2>
			<div id="infoPost">
				<ul class="list-inline">
	  				<li>
	  					<span class="glyphicon glyphicon-calendar"></span>
						<a href="">{{ $article->updated_at }}</a>
	  				</li>
	  				<li>|</li>
  					@foreach($article->tag as $b)
	  				<li>
	  					<a href="">{{ $b->tag }}</a>
	  				</li>
	  				@endforeach
				</ul>			
			</div>
			<br>
			<p>{{ $article->content }}</p>
		</div>
	</div>
@stop