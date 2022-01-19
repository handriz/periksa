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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => "\App\Http\Controllers\Admin", 'middleware' => 'is_admin'], function () {
        Route::resource('pages', 'PageController');
        Route::get('changeStatus', 'PageController@changeStatus')->name('pages.changeStatus');

        //izin
        Route::delete('izin/destroy', 'IzinController@massDestroy')->name('izin.massDestroy');
        Route::resource('izin', 'IzinController');
    });
});
