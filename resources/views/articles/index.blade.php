@extends('layout.master')
@section('title')
	Articles
@stop
@section('content')
	<div>
		@foreach($articles as $a)
			<div class="post" onmouseover="alert("welcome")">
				<h2><a class="nounderline" href="{{ route('article.show', $a->id) }}">{{ $a->title }}</a></h2>
				<div class="infoPost">
					<span class="glyphicon glyphicon-calendar"></span>
					<a href="">{{ $a->updated_at }}</a>
				</div>
				<p>{{ str_limit($a->content,250) }}</p>
				<a href="{{ route('article.show', $a->id) }}">Read more ...</a>
			</div>
		@endforeach
		<div class="row">
			<p>{!! $articles->render() !!}</p>
		</div>
	</div>

@stop