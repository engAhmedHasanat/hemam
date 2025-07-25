<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Favorite;
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

Route::get('/dashboard', function () {
    $jobs = Job::latest()->get();
    return view('pages.home', compact('jobs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// الصفحة الرئيسية - عرض الوظائف
Route::get('/', function () {
    $jobs = Job::latest()->get();
    return view('pages.home', compact('jobs'));
})->name('home');

// عرض تفاصيل وظيفة
Route::get('/jobs/{id}', function ($id) {
    $job = Job::with('company')->findOrFail($id);
    return view('pages.job-details', compact('job'));
})->name('jobs.details');

// إضافة إلى المفضلة
Route::post('/jobs/{id}/favorite', function ($id) {
    Favorite::firstOrCreate([
        'user_id' => auth()->id(),
        'job_id' => $id,
    ]);
    return back()->with('success', 'Added to favorites!');
})->middleware('auth')->name('jobs.favorite');

// عرض الوظائف المفضلة
Route::get('/favorites', function () {
    $favorites = Favorite::with('job')->where('user_id', auth()->id())->get();
    return view('pages.favorites', compact('favorites'));
})->middleware('auth')->name('favorites');

// صفحة الأسئلة الشائعة
Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');



require __DIR__.'/auth.php';
