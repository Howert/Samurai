<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('blog/{slug}', ['as'=>'blog.single', 'uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog', ['as'=>'blog.index', 'uses'=>'BlogController@getIndex']);
Route::get('contact', ['uses'=>'PagesController@getContact', 'as'=>'contact']);
Route::post('contact', ['uses'=>'PagesController@postContact', 'as'=>'contactmail']);

Route::get('about', ['uses'=>'PagesController@getAbout', 'as'=>'about']);
Route::get('/', ['uses'=>'PagesController@getIndex', 'as'=>'home']);
Route::resource('posts', 'PostController');


//routes for authentication
Auth::routes();
Route::get('/logout', ['uses'=>'Auth\LoginController@logout', 'as'=>'logout']);

//categories
Route::resource('categories', 'CategoryController', ['except'=>['create']]);

//tags route
Route::resource('tags', 'TagController', ['except'=>['create']]);

//comments route
Route::post('comments/{post_id}', ['uses'=>'CommentController@store', 'as'=>'comments.store']);
Route::get('comments/{comment_id}', ['uses'=>'CommentController@edit', 'as'=>'comments.edit']);
Route::put('comments/{comment_id}', ['uses'=>'CommentController@update', 'as'=>'comments.update']);
Route::delete('comments/{comment_id}', ['uses'=>'CommentController@destroy', 'as'=>'comments.destroy']);
Route::get('comments/{comment_id}/delete', ['uses'=>'CommentController@delete', 'as'=>'comments.delete']);

