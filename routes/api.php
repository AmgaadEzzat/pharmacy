<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['auth:user'],
    'namespace' => 'Api'], function() {
//    Route::post('getCategories', [CategoriesController::class, 'index']);
//    Route::post('getCategoryById', [CategoriesController::class,
//        'getCategoryById']);
//    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
//        Route::post('adminLogin', [AuthController::class, 'login']);
//        Route::post('adminLogout', [AuthController::class, 'logout'])
//            ->middleware(['auth.guard:admin-api']);
//    });
});
