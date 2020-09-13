@extends('main')
@section('title', '| Edit BLog Post')
@section('content')
    
    {!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT']) !!} 
    <div class=" form-group row my-4">

            <div class="col-md-8">
                    {{ Form::label('title', 'Title:')}}  
                    {{ Form::text('title', null, ["class"=>'form-control mb-4'])}}

                    {{ Form::label('slug', 'Slug:')}}
                    {{ Form::text('slug', null, ["class"=>'form-control'])}} 

                    {{ Form::label('category_id', 'Category:')}}
                    {{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}                  
                    

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