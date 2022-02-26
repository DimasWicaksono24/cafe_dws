<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;


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
    return view('login.login-cafe');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('logout',[LoginController::class, 'logout'])->name('logout');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

//admin
Route::group(['middleware'=>['auth','CekRole:admin']], function(){
    
    Route::get('indexadmin', [AdminController::class, 'index'])->name('indexadmin');
    Route::get('createadmin', [AdminController::class, 'create'])->name('createadmin');
    Route::post('storeadmin', [AdminController::class, 'store'])->name('storeadmin');
    Route::get('destroyadmin/{id}', [AdminController::class, 'destroy'])->name('destroyadmin');
    Route::get('editadmin/{id}', [AdminController::class, 'edit'])->name('editadmin');
    Route::put('updateadmin/{id}', [AdminController::class, 'update'])->name('updateadmin');
});
//manager
Route::group(['middleware'=>['auth','CekRole:manager']], function(){
    Route::get('indexmanager', [ManagerController::class, 'index'])->name('indexmanager');
    Route::get('laporanmanager', [ManagerController::class, 'laporan'])->name('laporanmanager');
    Route::get('carimanager', [ManagerController::class, 'cari'])->name('carimanager');
    Route::get('createmanager', [ManagerController::class, 'create'])->name('createmanager');
    Route::post('storemanager', [ManagerController::class, 'store'])->name('storemanager');
    Route::get('destroymanager/{id}', [ManagerController::class, 'destroy'])->name('destroymanager');
    Route::get('editmanager/{id}', [ManagerController::class, 'edit'])->name('editmanager');
    Route::put('updatemanager/{id}', [ManagerController::class, 'update'])->name('updatemanager');
});

//kasir
Route::group(['middleware'=>['auth','CekRole:kasir']], function(){
    Route::get('indexkasir', [TransaksiController::class, 'index'])->name('indexkasir');
    Route::get('createkasir', [TransaksiController::class, 'create'])->name('createkasir');
    Route::post('storekasir', [TransaksiController::class, 'store'])->name('storekasir');

});