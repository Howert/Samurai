@extends('main')
@section('title', '| Create New Post')

@section('stylesheets')

    {!! Html::style('css/select2.min.css') !!}
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
        <h1> Create New Post</h1>

        {!! Form::open(['route' => 'posts.store', 'files'=>true]) !!}
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
            <!-- MUlti select tags.. using select2 css and js-->

            {{ Form::label('tags', 'Tags:')}}
            <select class="form-control select2-multiple" name="tags[]" multiple>

                @foreach ($tags as $tag)

                <option value="{{ $tag->id }}">{{ $tag->name}}</option>
                    
                @endforeach
            </select>

            {{ Form::label('featured_image', 'Upload featured image:')}}
            {{ Form::file('featured_image', ['class'=>'form-control'])}}

            {{Form::label('body', 'Post Body:')}}
            {{Form::textarea('body', null,['class' => 'form-control'])}}
            {{Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;'])}}
        {!! Form::close() !!}
        
        
        
        </div>   
    </div>

@endsection


@section('scripts')

    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
         $(document).ready(function() {
        $('.select2-multiple').select2();
        });

    </script>
   

      
    
@endsection