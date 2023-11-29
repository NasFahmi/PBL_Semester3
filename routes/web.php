<?php

use App\Http\Controllers\PreorderController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// enduser
Route::get('/', [HomeController::class, 'landingpage'])->name('landing_page');
Route::get('/katalog', [HomeController::class, 'katalog'])->name('katalog');
Route::get('/login', [AuthController::class, 'loginview'])->name('loginview');
Route::post('/login', [AuthController::class, 'Authlogin'])->name('login');

Route::get('/katalog/product/{id}', [HomeController::class, 'detailProduct'])->name('detail_product');


// admin

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'indexDashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/logout', [AuthController::class, 'logout'])->name('logout');


    Route::resource('/admin/product', ProductController::class);

    Route::resource('/admin/transaksi', TransaksiController::class);
   

    Route::resource('/admin/preorder', PreorderController::class);



});