<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/material.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button">
		@include('part/narbar')
		<main class="mdl-layout__content" id="main">
	    	<div class="page-content">
	    		<div class="row">
					<div class="col-md-8 col-md-offset-2" id="content">
	    				@yield('content')
	    			</div>
				</div>
	    	</div>
	  	</main>

		@include('part/footer')
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/app.js"></script>
		<script src="/js/material.min.js"></script>
		@yield('scripts')
	</div>
</body>
</html>