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
Route::any('/',  'HomeController@showHome')->name('welcome');
Route::prefix("photography")->group(function () {
    Route::any("/", 'PhotoController@showFolders')->name('photo');
    Route::any("/all", 'PhotoController@showAll')->name('all');
    Route::any("/{season}", 'PhotoController@showThumbnails')->name('thumbnails');
    Route::any("/{season}/{id}", 'PhotoController@showDetail')->name('detail');
});
Route::get("food", function () {return view('food');})->name("food");
Route::get("code", function () {return view('code');})->name("code");
Route::get("about", function () {return view('about');})->name("about");
