<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Dashboard\PharmacyController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Dashboard\StoresProductsController;
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
        ///////////////////////productRoutes/////////////////////////
        Route::group(['prefix' => 'product'], function() {
            Route::get('getProducts', [ProductController::class, 'index'])
                ->name('show.products');
            Route::get('createProducts', [ProductController::class, 'create'])
                ->name('create.product');
            Route::post('storeProduct', [ProductController::class, 'store'])
                ->name('store.product');
            Route::get('deleteProduct/{id}', [ProductController::class, 'destroy'])
                ->name('delete.product');
            Route::get('editProduct/{id}', [ProductController::class, 'edit'])
                ->name('edit.product');
            Route::post('updateProduct/{id}', [ProductController::class, 'update'])
                ->name('update.product');
        });
        /////////////////////pharmacyRouts///////////////////////////////////////
        Route::group(['prefix' => 'pharmacy'], function() {
            Route::get('getPharmacies', [PharmacyController::class, 'index'])
                ->name('show.pharmacies');
            Route::get('createPharmacy', [PharmacyController::class, 'create'])
                ->name('create.pharmacy');
            Route::post('storePharmacy', [PharmacyController::class, 'store'])
                ->name('store.pharmacy');
            Route::get('deletePharmacy/{id}', [PharmacyController::class, 'destroy'])
                ->name('delete.pharmacy');
            Route::get('editPharmacy/{id}', [PharmacyController::class, 'edit'])
                ->name('edit.pharmacy');
            Route::post('updatePharmacy/{id}', [PharmacyController::class, 'update'])
                ->name('update.pharmacy');
        });
        ////////////////////////////storesRoutes////////////////////////////////
        Route::group(['prefix' => 'store'], function() {
            Route::get('getStores', [StoreController::class, 'index'])
                ->name('show.stores');
            Route::get('createStore', [StoreController::class, 'create'])
                ->name('create.store');
            Route::post('storeStore', [StoreController::class, 'store'])
                ->name('store.store');
            Route::get('deleteStore/{id}', [StoreController::class, 'destroy'])
                ->name('delete.store');
            Route::get('editStore/{id}', [StoreController::class, 'edit'])
                ->name('edit.store');
            Route::post('updateStore/{id}', [StoreController::class, 'update'])
                ->name('update.store');
        });
        ///////////////////////Routes of products to stores ////////////////////
        Route::get('newSupply', [StoresProductsController::class, 'create'])
            ->name('create.newSupply');
        Route::post('storesSupply', [StoresProductsController::class, 'store'])
            ->name('store.newSupply');
        Route::get('showSupply', [StoresProductsController::class, 'index'])
            ->name('show.supplies');
    });

    Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin',
        'prefix' => 'admin'], function() {
        Route::get('login', [LoginController::class, 'login'])
            ->name('admin.login');
        Route::post('login', [LoginController::class, 'postAdminLogin'])
            ->name('post.admin.login');
    });
});;
