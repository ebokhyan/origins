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
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/home','TemplatesController@getHome')->name('main-home');
Route::get('/features','TemplatesController@getFeatures')->name('features');
Route::get('/features/{slug}','TemplatesController@getFeature')->name('feature');
Route::get('/news','TemplatesController@getNews')->name('news');

Route::get('/','MainController@getIndex')->name('home');
Route::post('/subscribe','MainController@subscribe')->name('subscribe');
Route::get('/verify-subscription','MainController@verifySubscription')->name('verify-subscribe');

