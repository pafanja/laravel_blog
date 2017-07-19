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

Route::group(['prefix'=>'edit'], function()
{
    Route::get('/', function()
    {
        return view('edit.dashboard');
    });
    Route::resource('post','PostController');
    Route::resource('pages','PageController');
    Route::resource('categories', 'CategoriesController');
});
Route::get('/', 'MainController@index');
Route::get('/show/{id}','MainController@show');
Route::get('elfinder',function(){
    return view('edit.elfinder');
});
Route::post('/show/{id}','CommentsController@save');
Route::post('/add_comment', 'CommentsController@addComment');
