@extends('main')

@section('title', ' | Delete Post')  

@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2">
        <h3 class="mb-4"> Mhhhhhhh! Delete this comment?</h3>

        <div>
            <p>
                <strong>Name:</strong>  {{ $comment->name}} <br>
                <strong>Email:</strong>  {{ $comment->email}} <br>
                <strong>Comment:</strong>  {{$comment->comment}} <br>
            </p>

        </div>
       

        <div>

            {!! Form::open(['route' =>['comments.destroy', $comment->id], 'method'=>'DELETE']) !!}

            {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])!!}
            {!! Form::close() !!}
        </div>


    </div>
</div>
    
@endsection