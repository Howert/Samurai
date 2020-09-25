@extends('main')

@section('title', ' | Tags')
    
@section('content')

    <div class="row justify-content-between">
        <div class="col-md-8">
            
            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tag Name</th>
                  </tr>
                </thead>
                <tbody>
                  
                   @foreach ($tags as $tag)
                   <tr>
                    <th>{{$tag->id}}</th>
                   <td><a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a></td>                 
                   </tr>
                       
                   @endforeach
                </tbody>
              </table>
        </div><!-- end of  col-md-8 -->

        <div class="col-md-3">
          <div class="row bg-light">
            <div class="col-sm-12">
              {!! Form::open(['route'=>'tags.store', 'method'=>'POST']) !!}
    
                <h3> New Tag</h3>
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class'=>'form-control']) }}
                <br>
                {{ Form::submit('Create New Tag', ['class'=>'btn btn-secondary btn-block']) }}
    
            {!! Form::close()!!}
            </div>
          </div>
            
        </div>
    
    </div>  

    
@endsection