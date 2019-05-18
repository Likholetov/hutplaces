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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

//Auth::routes();

Route::prefix('admin')->group(function () {
    Auth::routes();

    
});

Route::get('/home', 'HomeController@index')->name('home');



// Resource
Route::resources([
    'lots' => 'LotsController',
    'lotteries' => 'LotteryController',
    'orders' => 'OrdersController',
    'places' => 'PlacesController',
    'users' => 'UserController',
    'tickets' => 'TicketController'
]);

Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.main');
    Route::view('/auction', 'admin.auction');
    Route::view('/achievements', 'admin.achievements');
    Route::view('/cards', 'admin.cards');
    Route::view('/coins', 'admin.coins');
    Route::view('/lottery', 'admin.lottery');
    Route::view('/mails', 'admin.mails');
    Route::view('/packs', 'admin.packs');
    Route::view('/promo', 'admin.promo');
    Route::view('/statistic', 'admin.statistic');
    Route::view('/users', 'admin.users');
    Route::view('/wager', 'admin.wager');
    Route::view('/wof', 'admin.wheeloffortune');
});

//Route::get('/admin/{any?}', 'SinglePageController@admin')->where('any', '.*');
Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');