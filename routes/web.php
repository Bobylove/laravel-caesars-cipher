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
	return view('home/home');
});
Route::get('/edit', function (){
	return view('edit/edit');
});
Route::get('/show', 'TxtcrypteController@getShow');

Route::post('/edit/edit/new', 'TxtcrypteController@ajoutMessage');