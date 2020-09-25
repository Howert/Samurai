@extends('main')
@section('title', '| Edit BLog Post')

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
    
    {!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT', 'files'=>true]) !!} 
    <div class=" form-group row my-4">

            <div class="col-md-8">
                    {{ Form::label('title', 'Title:')}}  
                    {{ Form::text('title', null, ["class"=>'form-control mb-4'])}}

                    {{ Form::label('slug', 'Slug:')}}
                    {{ Form::text('slug', null, ["class"=>'form-control'])}} 

                    {{ Form::label('category_id', 'Category:')}}
                    {{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}   
                    
                    {{ Form::label('tags', 'Tags:')}}
                    {{ Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multiple', 'multiple']) }}

                    {{ Form::label('featured_image', 'Update featured image:', ['class'=>'mt-4'])}}
                    {{ Form::file('featured_image', ['class'=>'form-control mb-4'])}}
                    

                    {{ Form::label('body', 'Body:')}}
                    {{ Form::textarea('body', null, ["class"=>'form-control'])}}    
               
                
            </div>
            
            <div class="col-md-4">
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
                            {!! Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class'=>'btn btn-danger btn-block'])!!}
                            
                        </div>
                        <div class="col-sm-6">
                            {{Form::submit('Save Changes', ['class'=>'btn btn-success btn-block'])}}
                            
                        </div>
                </div>           
            </div>
    </div>
    {!! Form::close() !!}
    
    
@endsection

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
         
        $('.select2-multiple').select2();
        

    </script>
   

  
    
@endsection