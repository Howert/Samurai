@extends('main')
@section('title', ' | All Posts')

@section('content')
    <div class="row mt-4">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
        <a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary">Create Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Created at</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  
                   @foreach ($posts as $post)
                   <tr>
                   <th>{{$post->id}}</th>
                   <td>{{$post->title}}</td>
                   <td>{{substr($post->body, 0,50)}}{{ strlen($post->body) > 50 ? "..." : ""}}</td>
                   <td>{{date('M j, Y h:ia', strtotime($post->created_at))}}</td>
                   <td>
                   <a href="{{route('posts.show', $post->id)}}" class="btn btn-light btn-sm">View</a>
                   <a href="{{route('posts.edit', $post->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                    </td>
                   </tr>
                       
                   @endforeach
                </tbody>
              </table>
              <div class="pagination justify-content-center">
                {!! $posts->links();!!}
              </div>
              
        </div>
    </div>
    
@endsection