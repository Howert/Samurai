@extends('main')
@section('title', '| Create New Post')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
        <h1> Create New Post</h1>

        {!! Form::open(['route' => 'posts.store']) !!}
            {{Form::label('title', 'Title:')}}
            {{Form::text('title', null, ['class' => 'form-control', 'required'])}}
            {{Form::label('slug', 'Slug:')}}
            {{Form::text('slug', null,['class' => 'form-control', 'required', 'minlength'=>'5','maxlength'=>'255'])}}


            {{ Form::label('category_id', 'Category:')}}
            <select class="form-control" name="category_id">

                @foreach ($categories as $category)

                <option value="{{ $category->id}}">{{ $category->name}}</option>
                    
                @endforeach


            </select>

            {{Form::label('body', 'Post Body:')}}
            {{Form::textarea('body', null,['class' => 'form-control'])}}
            {{Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;'])}}
        {!! Form::close() !!}
        
        
        
        </div>   
    </div>

@endsection