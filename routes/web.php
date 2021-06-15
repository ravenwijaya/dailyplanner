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


Auth::routes();

Route::get('/', function () {
    // return view('item.index');
    return view('auth.login');
});
Route::group(['middleware'=>'auth'],function(){
// Route::get('/', 'HomeController@index')->name('home');
Route::get('/todo','TodoController@index')->name('todo.index');
Route::get('/todo/create','TodoController@create')->name('todo.create');
Route::post('/todoc','TodoController@store');
Route::get('/changestatus/{id}/{status}','TodoController@changestatus');
Route::get('/todo/{id}/edit','TodoController@edit');
Route::put('/todo/{id}','TodoController@update');
Route::delete('/todo/{id}','TodoController@destroy');
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');

});