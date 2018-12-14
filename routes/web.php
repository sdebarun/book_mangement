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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newhome','NewhomeController@index')->name('home');
Route::group(['prefix'=>'author','middleware'=>'auth'], function($id){
    Route::get('/add','AuthorController@addAuthor')->name('add');
    Route::post('/doAddauthor','AuthorController@createAuthor');
    Route::get('/viewall','AuthorController@listAuthors');
    //Route::get('/delete/{$id}','AuthorController@deleteAuthor');
    Route::post('/delete/{id}','AuthorController@deleteAuthor')->name('author.delete');
    Route::get('/edit/{id}','AuthorController@editAuthor');
    Route::post('/doedit/{id}','AuthorController@doeditAuthor');
});