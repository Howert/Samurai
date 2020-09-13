@extends('main')	
@section('title', '| Home')		
@section('content')			
			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron mt-4">
						<h1 class="text-center mb-5">Cybersec Forum</h1>
						<p class="lead"> You wanted to know who I am, Zero Cool? Well, let me explain the New World Order. Governments and corporations need people like you and me. We are Samurai... the Keyboard Cowboys... and all those other people out there who have no idea what's going on are the cattle... Moooo.</p>
					</div>
				</div>
			</div>			
		

		<!-- some posts go here -->
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					@foreach ($posts as $posts)
						<div class="post my-4">
							<h3> {{$posts->title}}</h3>
							<p class="text-justify"> {{$posts->body}} </p>
							<a class="btn btn-primary" href="{{ url('blog/'.$posts->slug) }}">Read The Post</a>
						</div>
						@if (!($loop->last))
                    		<hr>
                		@endif						
					@endforeach										
				</div>
			
				<div class="col-md-3 offset-md-1">
					<h2> HackSIde Bar</h2>
				</div>
			</div>
		</div>
@endsection

		
    
