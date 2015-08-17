  <header class="mdl-layout__header mdl-layout__header--scroll">
	<div class="mdl-layout__header-row">
  <!-- Title -->
  <span class="mdl-layout-title"><a id="title" href="{{ route('home') }}">Laravel 4rum</a></span>
  <!-- Add spacer, to align navigation to the right -->
  <div class="mdl-layout-spacer"></div>
  <!-- Navigation. We hide it in small screens. -->
  <nav class="mdl-navigation mdl-layout--large-screen-only">
  	@if (Auth::check())
  		<a class="mdl-navigation__link" href="{{ route('articles.create') }}">Create articles</a>
  	@else
    	<a class="mdl-navigation__link" href="{{ route('auth.register.get') }}">Register</a>
    	@if(Route::current()->getName() !== 'auth.login.get')
    		<a class="mdl-navigation__link" href="{{ route('auth.login.get') }}">Login</a>
  		@endif
  	@endif
  </nav>
</div>
</header>
@if (Auth::check())
	<div class="mdl-layout__drawer">
		<span class="mdl-layout-title"> {{ Auth::user()->name }}</span>
		<nav class="mdl-navigation">
		  <a class="mdl-navigation__link" href="{{ route('auth.logout') }}">Logout</a>
		</nav>
	</div>
@endif