<?php

use Illuminate\Support\Facades\Route;

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

/*
 * Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');
 */

Route::get("",function (){
    return view("welcome");
});
Route::get("/tpanel",function (){
    return redirect("/");
});

Route::get("/student",function (){
    return redirect("/");
});
Route::get("/profile",function (){
    return redirect("/");
});
Route::get("/objection",function (){
    return redirect("/");
});

// mail denemesi için
Route::get("/mail",function (){

    \Mail::to("yigitsilto5@gmail.com")->send(new \App\Mail\RegisterMail("user"));
});


