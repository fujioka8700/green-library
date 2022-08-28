<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Auth;

// ログイン、会員登録
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/user', fn() => Auth::user())->name('user');

// トークンリフレッシュ
Route::get('/reflesh-token', function (Request $request) {
  $request->session()->regenerateToken();
  return response()->json();
});

// 植物を扱うページ
Route::get('/plants', [PlantController::class, 'index'])->name('plants.index');
Route::post('/plants', [PlantController::class, 'store'])->name('plants.store');
Route::get('/plants/{id}', [PlantController::class, 'show'])->name('plants.show');
Route::put('/plants/{id}', [PlantController::class, 'update'])->name('plants.update');
