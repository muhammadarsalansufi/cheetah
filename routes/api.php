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

Route::middleware(['cors', 'json.response', 'auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // public routes
    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
});

Route::middleware('auth:api')->group(function () {
    Route::get('/articles', 'ArticleController@index')->middleware('api.admin')->name('articles');
    Route::post('/addimageSlider', 'SuperAdmin\SuperController@addimageSlider')->middleware('api.superAdmin')->name('addimageSlider');
    Route::post('/addContact', 'SuperAdmin\SuperController@addContact')->middleware('api.superAdmin')->name('addContact');
    Route::post('/addSocialLinks', 'SuperAdmin\SuperController@addSocialLinks')->middleware('api.superAdmin')->name('addSocialLinks');
    Route::post('/addContent', 'SuperAdmin\SuperController@addContent')->middleware('api.superAdmin')->name('addContent');
    Route::post('/addOtherImages', 'SuperAdmin\SuperController@addOtherImages')->middleware('api.superAdmin')->name('test');
    Route::post('/editimageSlider', 'SuperAdmin\SuperController@editimageSlider')->middleware('api.superAdmin')->name('editimageSlider');
    Route::post('/editContact', 'SuperAdmin\SuperController@editContact')->middleware('api.superAdmin')->name('editContact');
    Route::post('/editSocialLinks', 'SuperAdmin\SuperController@editSocialLinks')->middleware('api.superAdmin')->name('editSocialLinks');
    Route::post('/editContent', 'SuperAdmin\SuperController@editContent')->middleware('api.superAdmin')->name('editContent');
    Route::post('/editOtherImages', 'SuperAdmin\SuperController@editOtherImages')->middleware('api.superAdmin')->name('editOtherImages');
    Route::post('/deleteimageSlider', 'SuperAdmin\SuperController@deleteimageSlider')->middleware('api.superAdmin')->name('deleteimageSlider');
    Route::post('/deleteContact', 'SuperAdmin\SuperController@deleteContact')->middleware('api.superAdmin')->name('deleteContact');
    Route::post('/deleteSocialLinks', 'SuperAdmin\SuperController@deleteSocialLinks')->middleware('api.superAdmin')->name('deleteSocialLinks');
    Route::post('/deleteContent', 'SuperAdmin\SuperController@deleteContent')->middleware('api.superAdmin')->name('deleteContent');
    Route::post('/deleteOtherImages', 'SuperAdmin\SuperController@deleteOtherImages')->middleware('api.superAdmin')->name('deleteOtherImages');
    Route::get('/getimageSlider', 'SuperAdmin\SuperController@getimageSlider')->middleware('api.superAdmin')->name('getimageSlider');
    Route::get('/getContact', 'SuperAdmin\SuperController@getContact')->middleware('api.superAdmin')->name('getContact');
    Route::get('/getSocialLinks', 'SuperAdmin\SuperController@getSocialLinks')->middleware('api.superAdmin')->name('getSocialLinks');
    Route::get('/getContent', 'SuperAdmin\SuperController@getContent')->middleware('api.superAdmin')->name('getContent');
    Route::get('/getOtherImages', 'SuperAdmin\SuperController@getOtherImages')->middleware('api.superAdmin')->name('getOtherImages');


});

///web global routes
Route::get('/getimageSliderWeb', 'WebContentController@getimageSliderWeb')->name('getimageSliderWeb');
Route::get('/getContactWeb', 'WebContentController@getContactWeb')->name('getContactWeb');
Route::get('/getSocialLinksWeb', 'SWebContentController@getSocialLinksWeb')->name('getSocialLinksWeb');
Route::get('/getContentWeb', 'WebContentController@getContentWeb')->name('getContentWeb');
Route::get('/getOtherImagesWeb', 'WebContentController@getOtherImagesWeb')->name('getOtherImagesWeb');

