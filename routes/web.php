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

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');

//Route::get('/check', function (\App\Services\Newsletter $newsletter) {
//    $response = $newsletter->getMember();
//    dd($response);
//    print_r($response);
//});

Route::get('/','MainController@getIndex')->name('home');
Route::post('/subscribe','MainController@subscribe')->name('subscribe');

