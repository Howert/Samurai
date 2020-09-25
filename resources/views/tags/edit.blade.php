@extends('main')

@section('title', " | Edit Tag")

@section('content')

    {!! Form::model($tag, ['route'=>['tags.update', $tag->id], 'method'=>'PUT']) !!} 
    <div class=" form-group row my-4">
            <div class="col-md-8 offset-md-2">
                    {{ Form::label('title', 'Title:')}}  
                    {{ Form::text('name', null, ["class"=>'form-control mb-4'])}}   
                    
                    {!! Html::linkRoute('tags.show', 'Cancel', [$tag->id], ['class'=>'btn btn-danger btn-block'])!!}
                            
                   
                    {{Form::submit('Save Changes', ['class'=>'btn btn-success btn-block'])}}               
            </div>                            
    </div>
    {!! Form::close() !!}
        
@endsection