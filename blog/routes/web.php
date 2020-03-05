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

Auth::routes(['verify' =>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/me', 'UserController@index')->name('me')->middleware('auth');


Route::group(['prefix'=>'me','middleware' => ['auth']],function(){
    //CẬP NHẬT THÔNG TIN USER
    Route::post("update-Information",['as'=>'updateInformation','uses'=>"UserController@updateInformation"]);
    //VIEW THAY ĐỔI PASSWORD
    Route::get("password",['as'=>'showPassword','uses'=>"UserController@showPassword"]);
    //POST THAY ĐỔI PASSWORD
    Route::post("change-password",['as'=>'changePassword','uses'=>"UserController@changePassword"]);
    //VIEW DANH SÁCH USER
    Route::get("list-user",['as'=>'listUser','uses'=>"UserController@listUser"]);
    //Serch USER
    Route::get("search",['as'=>'search','uses'=>"UserController@search"]);
    //VIEW PROFILEUSER
    Route::get("profile-user/{id}",['as'=>'profileUser','uses'=>"UserController@profileUser"]);



});
