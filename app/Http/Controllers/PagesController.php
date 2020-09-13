<?php

namespace App\Http\Controllers;
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
    
}