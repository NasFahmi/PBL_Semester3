<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

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

// admin
Route::get('/login',[AuthController::class, 'loginview'])->name('loginview');
Route::post('/login',[AuthController::class, 'Authlogin'])->name('auth.login');
Route::get('/admin/dashboard', [DashboardController::class,'indexDashboard'])->name('admin.dashboard');
