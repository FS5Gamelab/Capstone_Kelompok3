<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'company'])->group(function () {
    Route::resource('/company-profile', CompaniesController::class);
    Route::resource('/company/jobs', JobsController::class);
    Route::get('/company/jobs-trash', [JobsController::class, 'trash'])->name('jobs.trash');
    Route::get('/company/jobs-restore/{id}', [JobsController::class, 'restore'])->name('jobs.restore');
    Route::resource('applications', ApplicationsController::class);
    Route::resource('company-category', CategoriesController::class);
    Route::get('company-category-trash', [CategoriesController::class, 'trash'])->name('company-category.trash');
    Route::get('company-category-restore/{id}', [CategoriesController::class, 'restore'])->name('company-category.restore');
    Route::delete('company-category-deletepermanently/{id}', [CategoriesController::class, 'deletepermanently'])->name('company-category.deletepermanently');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
