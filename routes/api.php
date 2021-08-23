<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::middleware(['cors', 'json.response', 'auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // public routes
    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
    Route::post('/logout', 'Auth\ApiAuthController@logou t')->name('logout.api');
});

Route::middleware('auth:api')->group(function () {
    Route::get('/resturantlistadmin', 'Restaurant\SuperAdminPermissionController@resturantlistadmin')->middleware('api.superAdmin')->name('resturantlistadmin');
    Route::post('/updaterestaurantlistitem', 'Restaurant\SuperAdminPermissionController@updaterestaurantlistitem')->middleware('api.superAdmin')->name('updaterestaurantlistitem');
    Route::post('/deleterestaurantlistitem', 'Restaurant\SuperAdminPermissionController@deleterestaurantlistitem')->middleware('api.superAdmin')->name('deleterestaurantlistitem');
    Route::get('/cateringlistadmin', 'Catering\SuperAdminPermissionController@cateringlistadmin')->middleware('api.superAdmin')->name('cateringlistadmin');
    Route::post('/updatecateringlistitem', 'Catering\SuperAdminPermissionController@updatecateringlistitem')->middleware('api.superAdmin')->name('updatecateringlistitem');
    Route::post('/deletecateringlistitem', 'Catering\SuperAdminPermissionController@deletecateringlistitem')->middleware('api.superAdmin')->name('deletecateringlistitem');
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
    Route::get('/getContactResponses', 'SuperAdmin\SuperController@getContactResponses')->middleware('api.superAdmin')->name('getContactResponses');
    Route::get('/getFeedbackResponses', 'SuperAdmin\SuperController@getFeedbackResponses')->middleware('api.superAdmin')->name('getFeedbackResponses');
    Route::post('/feedbackdelete', 'SuperAdmin\SuperController@feedbackdelete')->middleware('api.superAdmin')->name('feedbackdelete');
    Route::post('/contactresdelete', 'SuperAdmin\SuperController@contactresdelete')->middleware('api.superAdmin')->name('contactresdelete');
    Route::get('/pendingCaterings', 'SuperAdmin\SuperController@pendingCaterings')->middleware('api.superAdmin')->name('pendingCaterings');
    Route::post('/approvePendingCaterings', 'SuperAdmin\SuperController@approvePendingCaterings')->middleware('api.superAdmin')->name('approvePendingCaterings');

    Route::post('/addmenucategory', 'SuperAdmin\SuperController@addmenucategory')->middleware('api.superAdmin')->name('addmenucategory');
    Route::post('/updatemenucategory', 'SuperAdmin\SuperController@updatemenucategory')->middleware('api.superAdmin')->name('updatemenucategory');
    Route::get('/getmenucategory', 'SuperAdmin\SuperController@getmenucategory')->middleware('api.superAdmin')->name('getmenucategory');
    Route::post('/deletemenucategory', 'SuperAdmin\SuperController@deletemenucategory')->middleware('api.superAdmin')->name('deletemenucategory');
    Route::post('/addservicescategory', 'SuperAdmin\SuperController@addservicescategory')->middleware('api.superAdmin')->name('addservicescategory');
    Route::post('/deleteservicescategory', 'SuperAdmin\SuperController@deleteservicescategory')->middleware('api.superAdmin')->name('deleteservicescategory');
    Route::get('/getservicescategory', 'SuperAdmin\SuperController@getservicescategory')->middleware('api.superAdmin')->name('getservicescategory');
    Route::post('/updateservicescategory', 'SuperAdmin\SuperController@updateservicescategory')->middleware('api.superAdmin')->name('updateservicescategory');
    Route::get('/getEndUser', 'SuperAdmin\SuperController@getEndUser')->middleware('api.superAdmin')->name('getEndUser');


    ////// catering profile managment
    Route::post('/addprofile', 'Catering\CateringProfileController@addprofile')->middleware('api.cateringAdmin')->name('addprofile');
    Route::post('/editprofile', 'Catering\CateringProfileController@editprofile')->middleware('api.cateringAdmin')->name('contactresdelete');
    Route::get('/getOrders', 'Catering\CateringProfileController@getOrders')->middleware('api.cateringAdmin')->name('contactresdelete');
    Route::post('/deleteOrder', 'Catering\CateringProfileController@deleteOrder')->middleware('api.cateringAdmin')->name('contactresdelete');
    Route::post('/manageprofile', 'Catering\CateringProfileController@manageprofile')->middleware('api.cateringAdmin')->name('contactresdelete');
    Route::post('/seenorder', 'Catering\CateringProfileController@seenorder')->middleware('api.cateringAdmin')->name('seenorder');
    Route::post('/contactdeletecatering', 'Catering\CateringProfileController@contactdeletecatering')->middleware('api.cateringAdmin')->name('contactdeletecatering');
    Route::post('/contactreadcatering', 'Catering\CateringProfileController@contactreadcatering')->middleware('api.cateringAdmin')->name('contactreadcatering');
    Route::get('/getsingleprofile', 'Catering\CateringProfileController@getsingleprofile')->middleware('api.cateringAdmin')->name('getsingleprofile');


    ////// catering profile managment
    Route::post('/addprofileRestaurant', 'Restaurant\ReastaurantProfileController@addprofile')->middleware('api.restaurantAdmin')->name('addprofileRestaurant');
    Route::post('/addRestaurantPromo', 'Restaurant\ReastaurantProfileController@addRestaurantPromo')->middleware('api.restaurantAdmin')->name('addRestaurantPromo');
    Route::get('/getSingleRestaurantProfile', 'Restaurant\ReastaurantProfileController@getSingleRestaurantProfile')->middleware('api.restaurantAdmin')->name('getSingleRestaurantProfile');

    Route::post('/addFood', 'Restaurant\ReastaurantProfileController@addFood')->middleware('api.restaurantAdmin')->name('addFood');
    Route::post('/deleteFood', 'Restaurant\ReastaurantProfileController@deleteFood')->middleware('api.restaurantAdmin')->name('deleteFood');
    Route::post('/updateFood', 'Restaurant\ReastaurantProfileController@updateFood')->middleware('api.restaurantAdmin')->name('updateFood');
    Route::get('/getFood', 'Restaurant\ReastaurantProfileController@getFood')->middleware('api.restaurantAdmin')->name('getFood');


});

///web global routes
Route::get('/getimageSliderWeb', 'WebContentController@getimageSliderWeb')->name('getimageSliderWeb');
Route::get('/getContactWeb', 'WebContentController@getContactWeb')->name('getContactWeb');
Route::get('/getSocialLinksWeb', 'WebContentController@getSocialLinksWeb')->name('getSocialLinksWeb');
Route::get('/getContentWeb', 'WebContentController@getContentWeb')->name('getContentWeb');
Route::get('/getOtherImagesWeb', 'WebContentController@getOtherImagesWeb')->name('getOtherImagesWeb');
Route::post('/contactGlobal', 'WebContentController@contactGlobal')->name('contactGlobal');
Route::post('/user_feedback', 'WebContentController@user_feedback')->name('user_feedback');

Route::get('/getcateringServices', 'Catering\GlobalCateringController@getcateringServices')->name('getcateringServices');
Route::post('/getsinglecateringServices', 'Catering\GlobalCateringController@getsinglecateringServices')->name('getsinglecateringServices');
Route::post('/book_order', 'Catering\GlobalCateringController@book_order')->name('book_order');
Route::post('/getSingleRestaurant', 'Restaurant\GlobalRestaurantsController@getSingleRestaurant')->name('getSingleRestaurant');
Route::get('/getAllRestaurant', 'Restaurant\GlobalRestaurantsController@getAllRestaurant')->name('getAllRestaurant');
Route::post('/getSingleMenu', 'Restaurant\GlobalRestaurantsController@getSingleMenu')->name('getSingleMenu');
Route::get('/getAllMenu', 'Restaurant\GlobalRestaurantsController@getAllMenu')->name('getAllMenu');
Route::post('/idbasedfood', 'Restaurant\GlobalRestaurantsController@idbasedfood')->name('idbasedfood');


///food orders
Route::post('/newOrder', 'MobileApi\UserApp\AndroidApplicationController@newOrder')->name('newOrder');




///rider api
Route::post('/searchOrders', 'MobileApi\RiderApp\AndroidApplicationController@searchOrders')->name('searchOrders');
Route::post('/acceptOrder', 'MobileApi\RiderApp\AndroidApplicationController@acceptOrder')->name('acceptOrder');
Route::post('/declineOrder', 'MobileApi\RiderApp\AndroidApplicationController@declineOrder')->name('declineOrder');
Route::post('/cancleOrder', 'MobileApi\RiderApp\AndroidApplicationController@cancleOrder')->name('cancleOrder');
Route::post('/ordersHistory', 'MobileApi\RiderApp\AndroidApplicationController@ordersHistory')->name('ordersHistory');
Route::post('/pendingOrders', 'MobileApi\RiderApp\AndroidApplicationController@pendingOrders')->name('pendingOrders');
Route::post('/editRiderProfile', 'MobileApi\RiderApp\AndroidApplicationController@editRiderProfile')->name('editRiderProfile');
Route::get('/rejectedOrderList', 'MobileApi\RiderApp\AndroidApplicationController@rejectedOrderList')->name('rejectedOrderList');

