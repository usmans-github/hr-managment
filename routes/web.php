<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'create']);


Route::get('admin', [AdminController::class, 'create']);
Route::resource('admin', AdminController::class);
