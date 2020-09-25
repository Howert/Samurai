@extends('main')
@section('title', '| Index')

@section('content')


        <div class="row my-4">
            <div class="col-md-8 offset-md-2">
                <h1>All Posts</h1>
            </div>
        </div>

        @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2> {{$post->title}} </h2>
                <h6>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h6>
                <p class="text-justify"> {!! substr(strip_tags($post->body), 0,250) !!}{{ strlen(strip_tags($post->body)) > 250 ? "..." : ""}} </p>
                <a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary btn-sm"> Read More </a>
                @if (!($loop->last))
                    <hr>
                @endif
                
                
            </div>            
        </div> 
        @endforeach

        <div class="pagination justify-content-center">
            {{ $posts->links()}}
          </div>
        
            
        



    
@endsection
    
