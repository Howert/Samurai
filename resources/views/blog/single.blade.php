@extends('main')
@section('title', "|  $post->title ")

@section('stylesheets')

<script src="https://cdn.tiny.cloud/1/8bs3eg4sapo4c7zuvhmrdm8s0anxo6o35x7qrpsuqhv2wnyr/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link code',
            menubar: false,
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link',
            default_link_target: '_blank'
            });
    </script>
    
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1> {{ $post->title}} </h1>

            @if ($post->image)
            <div>
            <img src="{{ asset('images/'.$post->image)}}" alt="" class="img-fluid my-4">
            </div>
                
            @endif
            
            <p class="text-justify "> {!! $post->body !!} </p>
            
            <div class="mb-3">
                @foreach ($post->tags as $tag)
                    <span class="badge badge-secondary">{{$tag->name}}</span>
                
                @endforeach
            </div>
            
            <p>Category: {{ $post->category->name}}</p>
        <hr>         
        </div> <br> 
    </div>
    <!-- Posted Comments-->

    <div class="row">
        <div class="col-md-8 offset-md-2">

            <h2 class="mb-5"><span class="fa fa-comment-alt icon-size"></span>
                @if ($post->comment->count() > 1)
                {{ $post->comment->count()}} Comments
                    
                @elseif ($post->comment->count() === 1)
                {{ $post->comment->count()}} Comment                    
                @endif

                
            </h2>
            @foreach ($post->comment as $comment)
            <div class="row">
                <div class="col-sm-12">
                    <div class="author-info">
                    <img src="http://52.188.144.250/images/black-bg.jpg" alt="{{ $comment->name }}" class="author-image">

                        <div class="author-name">
                            <strong> {{ $comment->name}}</strong>
                            <p class="text-monospace small"> {{date('M j, Y h:ia', strtotime($post->created_at))}}</p>
                        </div>
                        
                    </div>                                      
                
                    <div class="comment-content">
                        <p class="text-justify"> {{ $comment->comment }} </p>
                        @if (!($loop->last))
                        <hr>
                        @endif
                    </div>
                    
                    
                    <br>                
                </div>
            </div>
            
        
            
                
            @endforeach
        </div>
    </div>


    <!-- eND OF THE COMMENTs-->

    <!-- comment form -->
    <div class="row">
        <div class="col-md-8 offset-md-2" id="comment-form">
            
            {{ Form::open(['route'=>['comments.store', $post->id], 'method'=>'POST']) }}

            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', 'Name:')}}
                    {{ Form::text('name', null, ['class'=>'form-control mb-3'])}}
                </div>

                <div class="col-md-6">
                    {{ Form::label('email', 'Email:')}}
                    {{ Form::text('email', null, ['class'=>'form-control mb-3'])}}
                </div>
                
                <div class="col-md-12">
                    {{ Form::label('comment', 'Comment:')}}
                    {{ Form::textarea('comment', null, ['class'=>'form-control mb-3', 'rows'=>5])}}

                    {{ Form::submit('Add Comment',['class'=>'btn btn-block btn-success'])}}
                </div>
            </div>

            {{ Form::close()}}
        </div>
    </div>
    <!-- End of comment form-->
@endsection
    
