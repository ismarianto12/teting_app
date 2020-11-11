<?php
// @author : ismarianto 
// @aplication build at 2020  

use Illuminate\Support\Facades\Route;
 
Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest')->name('/');

// Route::get('register')->middleware('guest');

Route::get('/logout', function () {
	return redirect('/');
})->middleware('auth');

Route::group(['middleware' => 'level'], function () {
	Route::get('home', 'HomeController@index')->name('home'); 
	//restrict 
	Route::get('restrict', 'HomeController@restrict')->name('restrict');
});



Auth::routes();