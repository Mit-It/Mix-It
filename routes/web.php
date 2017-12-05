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



Route::get('/', 'CocktailsController@index');
Route::get('/cocktails', 'CocktailsController@cocktails');
Route::get('/aboutus', 'PagesController@aboutus');

Route::get('/cocktails/{cocktail}','CocktailsController@detail');

/*Route::get('/login', 'PagesController@login');
Route::post('/loginme', 'LoginController@login');*/



Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');
