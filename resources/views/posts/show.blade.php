@extends('main')
@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">            

            <h1> {{$post->title}}</h1>

            @if ($post->image)
            <div>
            <img src="{{ asset('images/'.$post->image)}}" alt="" class="img-fluid my-4">
            </div>
                
            @endif

            <p class="lead text-justify">{!! $post->body !!}</p>
            @if ($post->comment->count() > 0)
            <hr>
            @endif
            
            <div>
                @foreach ($post->tags as $tag)
                    <span class="badge badge-secondary">{{$tag->name}}</span>
                
                @endforeach
            </div>

            @if ($post->comment->count() > 0)
            <div class="backend-comments">
                <h3 class="my-3">{{ $post->comment->count()}} Comments</h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>                            
                            <th>Comment</th>
                            <th width="50px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->comment as $comment)
                        <tr>                        
                            <td>{{$comment->name}}</td>                            
                            <td><p class="text-justify">{{$comment->comment}}</p></td>
                            <td>
                            <a href="{{ route('comments.edit', $comment->id)}}" class=""><span class="fa fa-edit"></span></a>
                            <a href="{{ route('comments.delete', $comment->id)}}" class=""><span class="fa fa-trash"></span></a>
                                
                            </td>
                        </tr>                            
                        @endforeach                       
                        
                    </tbody>
                </table>
            </div>
            
                
            @endif
           

        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-sm-6">
                    Url:
                    
                </div>
                <div class="col-sm-6">
                    <a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a>
                        
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    Category:
                    
                </div>
                <div class="col-sm-6">
                <p> {{ $post->category->name}}</p>
                        
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    Created at
                    
                </div>
                <div class="col-sm-6">
                    {{date('M j, Y h:ia', strtotime($post->created_at))}}
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    Last Edited at
                    
                </div>
                <div class="col-sm-6">
                    {{date('M j, Y h:ia', strtotime($post->updated_at))}}
                </div>

            </div>
                

                <hr>
            <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class'=>'btn btn-primary btn-block'])!!}
                        
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' =>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}

                        {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])!!}
                        {!! Form::close() !!}
                    </div>
            </div>
            

        </div>
    </div>




@endsection