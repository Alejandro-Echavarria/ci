<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('admin.index');

Route::resource('grades', GradeController::class)->names('admin.grades');
