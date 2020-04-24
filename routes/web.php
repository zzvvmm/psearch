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

Route::resource('labels', 'ImageController');
Route::get('summary', 'ImageController@summary')->name('summary');
Route::resource('captions', 'CaptionController');

Route::get('/', function () {
	// $path1 = public_path("json/multi_origin.json");
 //    $string = file_get_contents($path1);
 //    $json_a = json_decode($string, true);
	  
 //    return view('home', ['json_a' => $json_a]);
	return redirect('labels');
})->name('home');

Route::get('download','ImageController@download')->name('download');
