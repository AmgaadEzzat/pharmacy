<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin',
        'prefix' => 'admin'], function() {
        Route::get('/', [AdminController::class, 'index'])
            ->name('admin.index');
        Route::get('logout', [LoginController::class, 'logout'])
            ->name('admin.logout');

        Route::group(['prefix' => 'profile'], function() {
            Route::get('editProfile', [ProfileController::class, 'editProfile'])
                ->name('admin.profile');
            Route::put('update', [ProfileController::class, 'updateProfile'])
                ->name('update.admin.profile');
        });
    });

    Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin',
        'prefix' => 'admin'], function() {
        Route::get('login', [LoginController::class, 'login'])
            ->name('admin.login');
        Route::post('login', [LoginController::class, 'postAdminLogin'])
            ->name('post.admin.login');
    });
});;
