<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');

    Route::group(['prefix' => 'laporan', 'as' => 'laporan.'],function () {
        // Route::get('/', [LaporanController::class, 'index'])->name('index');
        // Route::get('create', [LaporanController::class, 'create'])->name('create');
        // Route::post('create', [LaporanController::class, 'store'])->name('store');
        Route::resource('/', LaporanController::class)->parameters([
            '' => 'laporan'
        ]);
        Route::get('/menu', [LaporanController::class, 'menu'])->name('menu');
        Route::patch('/{laporan}/verifikasi', [LaporanController::class, 'verifikasi'])->name('verifikasi');
        
    });

    Route::group(['prefix' => 'pegawai', 'as' => 'pegawai.'],function () {
        Route::resource('/', PegawaiController::class)->parameters([
            '' => 'pegawai'
        ]);
        Route::patch('/{pegawai}/update-status', [PegawaiController::class, 'update_status'])->name('updateStatus');
    });

    Route::group(['prefix' => 'unit', 'as' => 'unit.'],function () {
        Route::resource('/', UnitController::class)->parameters([
            '' => 'unit'
        ]);
        Route::patch('/{unit}/update-status', [UnitController::class, 'update_status'])->name('updateStatus');
    });
   
});
