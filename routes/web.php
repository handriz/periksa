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
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => "\App\Http\Controllers\Admin"], function () {

        //user
        Route::get('user/destroy', 'UsersController@changeStatus')->name('user.massDestroy');
        Route::resource('user', 'UsersController');
        Route::get('changeStatus', 'UsersController@changeStatus')->name('user.changeStatus');

        //izin
        Route::delete('izin/destroy', 'PermissionsController@massDestroy')->name('izin.massDestroy');
        Route::resource('izin', 'PermissionsController');

        //role
        Route::resource('roles', 'RolesController');
    });
});
