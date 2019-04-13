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
    Route::match(['get', 'post'], '/post/edit/{id}', ['uses' => 'News\NewsController@editNews', 'as' => 'editNews']);
    Route::get('/post/delete/{id}' ,['uses' => 'News\NewsController@deleteNews']);
    Route::match(['get', 'post'], '/category/{id}', ['uses' => 'News\NewsController@showCategory', 'as' => 'newsCategory']);
});

// Knowledge Base
Route::group(['prefix' => 'knowledge'], function () {
    Route::match(['get', 'post'], '/', ['uses' => 'Knowledge\KnowledgeController@index', 'as' => 'knowledge']);
    Route::match(['get', 'post'], '/article/create', ['uses' => 'Knowledge\KnowledgeController@create', 'as' => 'knowledgeCreate']);
    Route::match(['get', 'post'], '/article/show/{id}', ['uses' => 'Knowledge\KnowledgeController@show', 'as' => 'knowledgeShow']);
    Route::match(['get', 'post'], '/search', ['uses' => 'Knowledge\KnowledgeController@search', 'as' => 'knowledgeSearch']);
    Route::match(['get', 'post'], '/category/{id}', ['uses' => 'Knowledge\KnowledgeController@showCategory', 'as' => 'knowledgeCategory']);
    Route::match(['get', 'post'], '/article/edit/{id}', ['uses' => 'Knowledge\KnowledgeController@edit', 'as' => 'knowledgeEdit']);
});

// Crypto
Route::group(['prefix' => 'crypto'], function () {
    Route::match(['get', 'post'], '/', ['uses' => 'Crypto\CryptoController@index', 'as' => 'crypto']);

    // Organization
    Route::match(['get', 'post'], '/organizations', ['uses' => 'Crypto\CryptoOrganizationsController@index', 'as' => 'cryptoOrganizationsIndex']);
    Route::match(['get', 'post'], '/organizations/show/{id}', ['uses' => 'Crypto\CryptoOrganizationsController@show', 'as' => 'cryptoOrganizationsShow']);
    Route::match(['get', 'post'], '/organizations/create', ['uses' => 'Crypto\CryptoOrganizationsController@create', 'as' => 'cryptoOrganizationsCreate']);
    Route::match(['get', 'post'], '/organizations/edit/{id}', ['uses' => 'Crypto\CryptoOrganizationsController@edit', 'as' => 'cryptoOrganizationsEdit']);
    Route::match(['get', 'post'], '/organizations/delete/{id}', ['uses' => 'Crypto\CryptoOrganizationsController@delete', 'as' => 'cryptoOrganizationsDelete']);

    // InformationSystems
    Route::match(['get', 'post'], '/info-systems', ['uses' => 'Crypto\CryptoInformationSystemController@index', 'as' => 'cryptoInfoSystemIndex']);
    Route::match(['get', 'post'], '/info-systems/create', ['uses' => 'Crypto\CryptoInformationSystemController@create', 'as' => 'cryptoInfoSystemCreate']);
    Route::match(['get', 'post'], '/info-systems/edit/{id}', ['uses' => 'Crypto\CryptoInformationSystemController@edit', 'as' => 'cryptoInfoSystemEdit']);
    Route::match(['get', 'post'], '/info-systems/delete/{id}', ['uses' => 'Crypto\CryptoInformationSystemController@delete', 'as' => 'cryptoInfoSystemDelete']);

    // Assignments
    Route::match(['get', 'post'], '/assignments', ['uses' => 'Crypto\CryptoAssignmentsController@index', 'as' => 'cryptoAssignmentsIndex']);
    Route::match(['get', 'post'], '/assignments/create', ['uses' => 'Crypto\CryptoAssignmentsController@create', 'as' => 'cryptoAssignmentsCreate']);
    Route::match(['get', 'post'], '/assignments/edit/{id}', ['uses' => 'Crypto\CryptoAssignmentsController@edit', 'as' => 'cryptoAssignmentsEdit']);
    Route::match(['get', 'post'], '/assignments/delete/{id}', ['uses' => 'Crypto\CryptoAssignmentsController@delete', 'as' => 'cryptoAssignmentsDelete']);


});
