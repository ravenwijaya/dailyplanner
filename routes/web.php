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
Route::get('invite/{token}', 'InviteController@invite');
Route::post('/register/{token}', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
  ]);
Auth::routes();

Route::get('/', function () {
    // return view('item.index');
    return view('auth.login');
});
Route::group(['middleware'=>'auth'],function(){
// Route::get('/', 'HomeController@index')->name('home');
//WORKSPACE
Route::get('/workspace','WorkspaceController@index')->name('workspace.index');
Route::get('/workspace/firstcreate','WorkspaceController@firstcreate');
Route::get('/workspace/create','WorkspaceController@create');
Route::post('/workspace/create','WorkspaceController@store');
Route::delete('/workspace/{id}','WorkspaceController@destroy');
Route::get('/workspace/{id}/edit','WorkspaceController@edit')->name('workspace.edit');
Route::delete('/member/delete/{id}/{memberid}','WorkspaceController@memberdelete');
Route::put('/workspace/invite','WorkspaceController@invite');
Route::put('/workspace/name','WorkspaceController@changename');

//TODO
Route::get('/todo/{id}','TodoController@index')->name('todo.index');
Route::get('/todo/{id}/create','TodoController@create');
Route::post('/todo/{id}','TodoController@store');
Route::get('/todo/{id}/edit','TodoController@edit');
Route::put('/todo/{id}','TodoController@update');

Route::delete('/todo/{id}','TodoController@destroy');
Route::get('/changestatus/{id}/{status}','TodoController@changestatus');
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');

// Route::get('/workspace','WorkspaceController@index');
//INVITE

 //$this->post('register', 'Auth\AuthController@register');
// Route::get('invite', 'InviteController@invite')->name('invite');
// Route::post('invite', 'InviteController@process')->name('process');
// // {token} is a required parameter that will be exposed to us in the controller method
// Route::get('accept/{token}', 'InviteController@accept')->name('accept');






});