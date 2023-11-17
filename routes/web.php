<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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


Route::get('/welcome', function () {
   return view('welcome');
});

Route::get('/admin/dashboard', function () {
   return view('pages.admin.dashboard');
});
Route::get('/login',[AuthController::class, 'loginview'])->name('loginview');
Route::get('/', [HomeController::class, 'landingpage'])->name('landing_page');
Route::get('/katalog', [HomeController::class, 'katalog'])->name('katalog');
