<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getIndex(){
        
        $post = Post::orderBy('id', 'desc')->paginate(10);
              
        return view('blog.index')->withPosts($post);

    }

    public function getSingle($slug){
        
        //get post with the slug value passed

        $post = Post::where('slug', '=', $slug)->first();

        //return the view and pass post object

        return view('blog.single')->withPost($post);

    }
}
