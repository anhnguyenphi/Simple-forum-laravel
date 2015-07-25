<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	@include('part/narbar')
	<div class="container main-content" id="main">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" id="content">
				@yield('content')
			</div>
		</div>
	</div>
	@include('part/footer')
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/app.js"></script>
	@yield('scripts')
</body>
</html>