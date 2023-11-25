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

    Route::get('/admin/product/detail/{id}', [ProductController::class, 'viewDetail'])->name('product.viewdetail');
    
    Route::get('/admin/product/create/image', [ProductController::class, 'viewstoreImage'])->name('product.storeImage');
    Route::post('/admin/product/create/image', [ProductController::class, 'finalStore'])->name('product.storeImagePost');

    //! di edit view yang dimana mengedit product spesifikasi next btn akan mengeksekusi updatePost 
    Route::post('/admin/product/{id}/edit',[ProductController::class,'updatePost'])->name('product.updatePost');
    //! dan akan mengarahkan keroute dibawah ini, 
    Route::get('/admin/product/edit/image',[ProductController::class,'viewUpdateImage'])->name('product.editImage');
    //! dari route image view diatas ini btn upload akan mengeksekusi product.update dimana method patch

    Route::resource('/admin/product', ProductController::class);

    Route::resource('/admin/transaksi', TransaksiController::class);

    Route::resource('/admin/preorder', PreorderController::class);



});