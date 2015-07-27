@extends('layout.master')
@section('title')
	Articles
@stop
@section('content')
	<div>
		@foreach($articles as $article)
			<div class="post" onmouseover="alert("welcome")">
				<h2><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></h2>
				<div class="infoPost">
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
				<p>{{ str_limit($article->content,250) }}</p>
				<a href="{{ route('article.show', $article->id) }}">Read more ...</a>
			</div>
			<hr>
		@endforeach
		<div class="row">
			<p>{!! $articles->render() !!}</p>
		</div>
	</div>

@stop