<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/category','Api\ApiCategoryController@getCategory');
Route::get('/subcategory','Api\ApiCategoryController@getSubcategory');
Route::get('/childcategory','Api\ApiCategoryController@getChildcategory');

Route::get('/country','Api\AdressController@getCountry');
Route::get('/state','Api\AdressController@getState');
Route::get('/city','Api\AdressController@getCity');
