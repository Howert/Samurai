@extends('main')

@section('title', ' | Edit Comment')

@section('content')

{!! Form::model($comment, ['route'=>['comments.update', $comment->id], 'method'=>'PUT']) !!} 


<div class=" form-group row my-4">

    

        <div class="col-md-8 offset-md-2">
            <h3 class="mb-4"> Edit the comment</h3>
                {{ Form::label('name', 'Name:')}}  
                {{ Form::text('name', null, ["class"=>'form-control mb-4', 'disabled'=>'disabled'])}}

                {{ Form::label('email', 'Email:')}}
                {{ Form::text('email', null, ["class"=>'form-control mb-4','disabled'=>'disabled'])}} 

                
                {{ Form::label('comment', 'Comment:')}}
                {{ Form::textarea('comment', null, ["class"=>'form-control mb-3'])}} 
                
            <div>
                {{Form::submit('Update Comment', ['class'=>'btn btn-success btn-block'])}}
                {!! Html::linkRoute('posts.show', 'Cancel', [$comment->post->id], ['class'=>'btn btn-danger btn-block mb-4'])!!}                   
                
            </div>           
           
            
        </div>
        
        
            
            
        
</div>
{!! Form::close() !!}
    
@endsection
    
