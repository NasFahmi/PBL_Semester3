<?php

use App\Http\Controllers\Api\ApiPreorderController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiTransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiDashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// ! auth
Route::post('/login', [ApiAuthController::class, 'AuthLogin'])->name('login');


Route::get('/test',function(){
    return 'hello';
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [ApiAuthController::class, 'logout']);
    Route::get('/dashboard',[ApiDashboardController::class,'index']);

});
Route::resource('/product',ApiProductController::class);
Route::resource('/preorder',ApiPreorderController::class);
Route::resource('/transaksi',ApiTransaksiController::class);
