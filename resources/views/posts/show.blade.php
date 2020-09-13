@extends('main')
@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1> {{$post->title}}</h1>

            <p class="lead text-justify">{{$post->body}}</p>
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