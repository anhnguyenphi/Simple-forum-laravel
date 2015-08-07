<nav id="navbar" class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ route('home') }}">Lavarel 4rum</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			@if (Auth::check())
			<li><a href="{{ route('articles.create') }}">Create articles</a></li>
			@endif
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li> <a href="#">Contact</a> </li>
			@if (Auth::check())
				<li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
          		<ul class="dropdown-menu">
            	<li><a href="#">profile</a></li>
            	<li role="separator" class="divider"></li>
           		<li><a href="{{ route('auth.logout') }}">Logout</a></li>
           		</ul>
			@else
				<li>
					<p class="navbar-btn" style="margin-right: 10px;">
						<a href="{{ route('auth.register.get') }}" class="btn btn-default ">Register</a>
					@if(Route::current()->getName() !== 'auth.login.get')
						<a href="{{ route('auth.login.get') }}" class="btn btn-default ">Login</a>
	                </p>
	                @endif
				</li>
			@endif
          </ul>
        </li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>