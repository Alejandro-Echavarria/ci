<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\QuaterController;

Route::get('/', [HomeController::class, 'index'])->name('admin.index');

Route::resource('grades', GradeController::class)->except('show')->names('admin.grades');

Route::resource('quaters', QuaterController::class)->except('store', 'show', 'update')->names('admin.quaters');