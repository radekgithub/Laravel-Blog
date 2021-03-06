<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('pages.about');//allowed to use pages/about instead of pages.about
});
*/

//Instead of returning view in my routes file like above for welcome page or about page
//it is better to call controller method which returns view
Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user ' . $name . ' with the id of ' . $id;
});

//through ::resource syntax I get all PostController routes instead of adding new entry for each one
Route::resource('posts', 'PostsController');

Route::get('posts/posts_by_user/{id}', 'PostsController@showPostsByUser');

Route::get('comments/create/{id}', 'CommentsController@create');

Route::post('comments/store', 'CommentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');