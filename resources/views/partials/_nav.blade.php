<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="/">54mur41</a>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="{{Request::is('/') ? "nav-item active" : "nav-item"}}">
				<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
				</li>

				<li class="{{Request::is('about') ? "nav-item active" : "nav-item"}}">
					<a class="nav-link" href="{{ route('about')}}">About</a>
				</li>

				<li class="{{Request::is('blog') ? "nav-item active" : "nav-item"}}">
				<a class="nav-link" href="{{ route('blog.index')}}">Blog</a>
				</li>
				
				<li class="{{Request::is('contact') ? "nav-item active" : "nav-item"}}">
				<a class="nav-link" href=" {{ route('contact')}} ">Contact</a>
				</li>
			</ul>
			 <!-- Dropdown -->
			<ul class="nav navbar-nav navbar-right">
				
				@if ( Auth::check())
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Hello, {{ Auth::user()->name}}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ route('posts.index')}}">Posts</a>
					<a class="dropdown-item" href="{{ route('categories.index')}}">Categories</a>
					<a class="dropdown-item" href="{{ route('tags.index')}}">Tags</a>
					<a class="dropdown-item" href="{{ route('logout')}}">Logout</a>
					</div>
					</li>	
					
				@else
					<a href="{{ route('login')}}" class="btn btn-default"> Login </a>
				
				@endif

				
			</ul>
		</div>
		</nav>