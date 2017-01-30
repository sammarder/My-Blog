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
Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});
Route::get('/',  'HomeController@showName')->name('welcome');
Route::get("photo", 'PhotoController@showPage')->name('photo');
Route::get("food", function () {return view('food');})->name("food");
Route::get("code", function () {return view('code');})->name("code");
//Route::get("/test", function () {return view('photo');})->name('photo');

//Auth::routes();

//Route::get('/home', 'HomeController@index');
