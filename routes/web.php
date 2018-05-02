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

Route::get('/delete/{cocktail}', 'CocktailsController@delete');
Route::get('/delete_confirm/{cocktail}', 'CocktailsController@deleteconfirm');

Route::get('/create', 'PagesController@create');
Route::post('/new_cocktail', 'CocktailsController@new_cocktail');

Route::get('/recipebooks', 'RecipebookController@listRecipebooks');
Route::get('/recipebooks/{recipebook}', 'RecipebookController@recipebook');
Route::get('/newRecipebook', 'PagesController@newRecipebook');
Route::post('/createRecipebook', 'RecipebookControllerRecipebookController@createRecipebook');
Route::get('/recipebookAddCocktail', 'RecipebookController@recpipebookAddCocktail');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

