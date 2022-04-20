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

Route::get('/', function () { return redirect(App::getLocale()); })->name('home');

Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|hy']],function (){
    Route::get('/','MainController@getIndex');
    Route::get('/home','HomeController@getHome')->name('main-home');

    Route::get('/features','FeaturesController@getFeatures')->name('features');
    Route::get('/features/{slug}','FeaturesController@getFeature')->name('feature');

    Route::get('/news','NewsController@getNews')->name('news');
    Route::get('/news/{slug}','NewsController@getNewsBySlug')->name('news_inner');

    Route::get('/recipes','RecipesController@getRecipes')->name('recipes');
    Route::get('/recipes/{slug}','RecipesController@getRecipeBySlug')->name('recipes.inner');

    Route::get('/guides','GuidesController@getGuides')->name('guides');
    Route::get('/guides/{slug}','GuidesController@getGuidesBySlug')->name('guides.inner');

    Route::get('/about-us','AboutController@getAboutPage')->name('about');
    Route::post('/get-info','AboutController@getDetails')->name('about.popup');

    Route::get('/terms','PrivacyController@getTerm')->name('term');
    Route::get('/policy','PrivacyController@getPolicy')->name('policy');

    Route::get('/contacts','ContactsController@getContacts')->name('contacts');

    Route::get('/wines','HomeController@getWines')->name('wines');
    Route::get('/shop','HomeController@getShop')->name('shop');
    Route::get('/wine-club','HomeController@getWineClub')->name('wine-club');

    Route::get('/search','SearchController@getResults')->name('search');
});

Route::post('/send-contact','ContactsController@sendContact')->name('contacts.request');

Route::post('/subscribe','MainController@subscribe')->name('subscribe');
Route::get('/verify-subscription','MainController@verifySubscription')->name('verify-subscribe');

//Language change
Route::get('lang/{locale}',  'LocalizationController@changeLang')->name('lang');
