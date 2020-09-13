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
Route::get('about', ['uses'=>'PagesController@getAbout', 'as'=>'about']);
Route::get('/', 'PagesController@getIndex');
Route::resource('posts', 'PostController');


//routes for authentication
Auth::routes();
Route::get('/logout', ['uses'=>'Auth\LoginController@logout', 'as'=>'logout']);

//categories
Route::resource('categories', 'CategoryController', ['except'=>['create']]);

//tags route
Route::resource('tags', 'TagController', ['except'=>['create']]);

