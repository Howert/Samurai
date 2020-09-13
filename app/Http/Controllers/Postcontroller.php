<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;

class PostController extends Controller
{
    public function __construct(){

        //this controller should only be available to authenticated users
        $this->middleware('auth');


    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all posts into it
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        //return a view and pass the variable with the posts
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //takes the data from view('posts.create')
        //validate the data
        $this -> validate($request, [
            'title' => 'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'body' => 'required'    

            ]);


        //store data in the database

        $post = new Post;

        $post->title = $request ->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post ->save(); //saves it into the database

        Session::flash('Success', 'The Blogpost was Successfully Saved!!');

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as a variable
        $post = Post::find($id);

        //call all the categories from the table as well
        $categories = Category::all();

        $cats = [];
        foreach ($categories as $category){
            $cats[$category->id] = $category->name;
        }

        //return the view and pass in the variable from previous step
        return view('posts.edit')->withPost($post)->withCategories($cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         //validate the data
         $this -> validate($request, [
            'title' => 'required|max:255',
            'category_id'=>'required|integer',
            'body' => 'required'    

            ]);


        //save the data to the database
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input("body");
        $post->save();

        //set flash data with success message
        Session::flash('Success', 'The Blogpost was Successfully Updated!!');

        //redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('Success', 'The Post was successfully Deleted');

        return redirect()->route('posts.index');
    }
}
