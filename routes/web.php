<?php

use App\Http\Controllers\AppliedJobsController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeekersController;
use App\Models\Jobs;
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
    $jobs = Jobs::all();
    return view('welcome', compact('jobs'));
});

Route::get('/beranda', function () {
    $jobs = Jobs::all(); // or however you retrieve the jobs
    return view('seeker.layout.master', compact('jobs'));
})->name('beranda');
Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'company'])->group(function () {
    Route::get('post', [DashboardController::class, 'post']);
    Route::resource('/company-profile', CompaniesController::class);
    Route::resource('/company/jobs', JobsController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/seeker/home', function () {
        return view('seeker.layout.master');
    })->name('seeker.home');
    Route::get('/seeker/applied_jobs', [SeekersController::class, 'appliedJobs'])->name('seeker.applied_jobs');


});

require __DIR__.'/auth.php';
