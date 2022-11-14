<?php

use App\Http\Controllers\Admin\CalculateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\QuaterController;
use App\Http\Controllers\Admin\CollegeController;

Route::get('/', [HomeController::class, 'index'])->name('admin.index');

Route::get('/calculate', [CalculateController::class, 'ic'])->name('admin.ic');

Route::get('/calculate/gradevalue/{grade}', [CalculateController::class, 'gradeValue'])->name('admin.gradeValue');

Route::resource('grades', GradeController::class)->except('show')->names('admin.grades')->middleware('role:admin');

Route::resource('colleges', CollegeController::class)->except('show')->names('admin.colleges')->middleware('role:admin');

Route::resource('quaters', QuaterController::class)->except('store', 'show', 'update')->names('admin.quaters');