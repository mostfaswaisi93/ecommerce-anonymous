<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/admins', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
