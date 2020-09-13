@extends('main')
@section('title', '| COntact')
@section('content')
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h3>We love getting in touch!!</h3>
                    <hr>
                    <form class="mt-5">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" placeholder="Enter email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input class="form-control" placeholder="Subject" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="subject">Message:</label>
                            <textarea class="form-control" placeholder="Your message"> </textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form> 
                </div>
            </div>
@endsection

        