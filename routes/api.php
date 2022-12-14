<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Auth;

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/user', fn() => Auth::user())->name('user');

// トークンリフレッシュ
Route::get('/reflesh-token', function (Request $request) {
  $request->session()->regenerateToken();
  return response()->json();
});

Route::get('/plants', [PlantController::class, 'index'])->name('plants.index');
Route::get('/plants/{id}', [PlantController::class, 'show'])->name('plant.show');
Route::post('/plants', [PlantController::class, 'store'])->name('plant.store');
