<?php
// @author : ismarianto 
// @aplication build at 2020  

use Illuminate\Support\Facades\Route;

Auth::routes();
// Route::get('/', 'HomeController@index')->middleware('auth')->name('/');


Route::get('/logout', function () {
	return redirect('/');
})->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('home', 'HomeController@index')->name('home'); 
	//restrict 
	Route::get('restrict', 'HomeController@restrict')->name('restrict');
});
