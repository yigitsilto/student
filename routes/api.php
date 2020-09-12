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

/*
 * Route::middleware('auth:api')->group(function () {
    Route::get('dashboard', function () {
        return response()->json(['data' => 'Test Data']);
    });
});
 */


// auth routlerı burada listelenir
Route::group(['middleware' => 'api', 'prefix' => 'auth',], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});


Route::group(['middleware'=>'api',],function (){
    // öğrenci bilgisi çekilen kısım
    Route::get("student/{id}",'HomeController@student_info');
    Route::post("update/student",'HomeController@update_student');
    Route::post("update/profile",'HomeController@update_profile');
});

