@extends('main')

@section('title', ' | Categories')
    
@section('content')

    <div class="row justify-content-between">
        <div class="col-md-8">
            
            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                  </tr>
                </thead>
                <tbody>
                  
                   @foreach ($categories as $category)
                   <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->name}}</td>                 
                   </tr>
                       
                   @endforeach
                </tbody>
              </table>
        </div><!-- end of  col-md-8 -->

        <div class="col-md-3">
          <div class="row bg-light">
            <div class="col-sm-12">
              {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
    
                <h3> New Category</h3>
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class'=>'form-control']) }}
                <br>
                {{ Form::submit('Create New Category', ['class'=>'btn btn-secondary btn-block']) }}
    
            {!! Form::close()!!}
            </div>
          </div>
            
        </div>
    
    </div>  

    
@endsection