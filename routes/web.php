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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// News

Route::group(['prefix' => 'news'], function () {
    Route::match(['get', 'post'], '/', ['uses' => 'News\NewsController@getNewsList', 'as' => 'news']);
    Route::get('/post/{id}' ,['uses' => 'News\NewsController@getNews'])->where(['id' => '[0-9]+']);
    Route::match(['get', 'post'], '/post/create' ,['uses' => 'News\NewsController@createNews', 'as' => 'createNews']);
    Route::get('/post/edit/{id}' ,['uses' => 'News\NewsController@editNews']);
    Route::get('/post/delete/{id}' ,['uses' => 'News\NewsController@deleteNews']);
});
