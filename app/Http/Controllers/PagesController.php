<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\Post;

class PagesController extends Controller {

    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view('pages.welcome')->withPosts($posts);

    }

    public function getAbout() {
        $name = 'Mohe Seho';
        $email = 'moheseho@gmail.com';
        return view('pages/about');

    }

    public function getContact() {
        return view('pages/contact');
        
    }

    public function postContact(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'subject'=>'min:5',
            'message'=>'required|min:10'
            ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage'=> $request->message
        ];

        Mail::send('emails.contact', $data, function($message) use ($data ){
            $message->from($data['email']);
            $message->to('norbertseho@gmail.com');
            $message->subject($data['subject']);
        });


        Session::flash('Success', 'Your email was sent');
        return redirect()->route('home');

    }
    
}