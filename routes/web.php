<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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


Route::get('/','IndexController@index');





//admin

Route::group([
    'prefix'=>'auth',
    'middleware'=>'admin',
],function(){
    Route::view('/','backend.admin.index')->name('auth');
    Route::resource('/category','CategoryController');
    Route::resource('/subcategory','SubcategoryController');
    Route::resource('/childcategory','ChildcategoryController');
});

//ads

Route::resource('/advertisement','AdvertisementController')->middleware('auth');

//profil

Route::get('/profile','ProfileController@index')->name('profile.index')->middleware('auth');
Route::post('/profile','ProfileController@update')->name('profile.update')->middleware('auth');
Route::get('/profile/delAvatar','ProfileController@deleteAvatar')->name('profile.deleteAvatar')->middleware('auth');

//frontend

Route::get('/product/{categorySlug}','FrontendController@findBasedOnCategory')->name('category.show');
Route::get('/product/{categorySlug}/{subcategorySlug}','FrontendController@findBasedOnSubcategory')->name('subcategory.show');
Route::get('/product/{categorySlug}/{subcategorySlug}/{childcategorySlug}','FrontendController@findBasedOnChildcategory')->name('childcategory.show');
Route::get('/view/product/{id}','FrontendController@findAd')->name('product.view');
Route::get('/user/view/products/{id}','FrontendController@viewUserAds')->name('seller.ads');

//message


Route::view('/message','message.index')->middleware('auth');
Route::post('/send/message','SendMessageController@store')->middleware('auth');
Route::post('/start-conversation','SendMessageController@startConversation')->middleware('auth');
Route::get('/users','SendMessageController@ChatWhithUser')->middleware('auth');
Route::get('/message/user/{id}','SendMessageController@ShowMessages')->middleware('auth');
Route::get('/message/user/delete/{id}','SendMessageController@destroyConversation')->middleware('auth');



//facebook

Route::get('auth/facebook','socialLoginController@facebookRedirect');
Route::get('auth/facebook/callback','socialLoginController@loginWithFacebook');



//test
Route::post('/test','SendMessageController@store');
Route::view('/test','layouts.sidebar');