@extends('main')
@section('title', '| COntact')
@section('content')
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h3>We love getting in touch!!</h3>
                    <hr>
                <form class="mt-5" action="{{ route('contactmail') }}" method="POST">
                    {{  csrf_field() }}
                        <div class="form-group">
                            <label name="email">Email address:</label>
                            <input type="email" name='email' class="form-control" placeholder="Enter email" id="email">
                        </div>
                        <div class="form-group">
                            <label name="subject">Subject:</label>
                            <input class="form-control" name='subject' placeholder="Subject" id="pwd">
                        </div>
                        <div class="form-group">
                            <label name="message">Message:</label>
                            <textarea class="form-control" name='message' placeholder="Your message"> </textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form> 
                </div>
            </div>
@endsection

        