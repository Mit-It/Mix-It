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



Route::get('/', 'PagesController@index');
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
Route::post('/createRecipebook', 'RecipebookController@createRecipebook');
Route::get('/recipebookAddCocktail', 'RecipebookController@recpipebookAddCocktail');
Route::post('/addToRecipebook', 'RecipebookController@addCocktail');
Route::post('/recipebooks/delete_cocktail', 'RecipebookController@deleteCocktail');
Route::get('/delete_rb_confirm/{recipebook}', 'RecipebookController@deleteconfirm');
Route::get('/delete_rb/{recipebook}', 'RecipebookController@delete');

Route::post('/rateCocktail', 'RatingController@rateCocktail');
Route::post('/changeRating', 'RatingController@changeRating');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

