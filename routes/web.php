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

Route::view('/', 'welcome');
// Route::get('/about', function () {
//     return 'About Us';
// });
Route::view('about','about');
Route::view('contact','contact'); //Route::View == Route::get('route',function (){return view('route.blade.php')})

//passing data to routes
Route::get ('customers','CustomersController@list');
Route::post ('customers','CustomersController@store');