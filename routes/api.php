<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
    use App\Models\Job;
use App\Models\Favorite;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {

});  
//   Route::get('/job-seeker/all-jobs', [JobController::class, 'index']);
//     Route::get('/job-seeker/job-details/{id}', [JobController::class, 'show']);
//     Route::post('/job-seeker/jobs/{id}/mark-favorite', [JobController::class, 'favorite']);
//     Route::get('/job-seeker/favorite-jobs', [JobController::class, 'favorites']);


// ✅ عرض جميع الوظائف
Route::get('/job-seeker/all-jobs', function () {
    $jobs = Job::with('company')->latest()->get();
    return json_encode($jobs);
})->name('job-seeker.all-jobs');


// ✅ عرض تفاصيل وظيفة
Route::get('/job-seeker/job-details/{id}', function ($id) {
    $job = Job::with('company')->findOrFail($id);
    return view('pages.job-details', compact('job'));
})->name('job-seeker.job-details');


// ✅ إضافة وظيفة إلى المفضلة
Route::post('/job-seeker/jobs/{id}/mark-favorite', function ($id) {
    Favorite::firstOrCreate([
        'user_id' => auth()->id(),
        'job_id' => $id,
    ]);
    return back()->with('success', 'تمت الإضافة إلى المفضلة');
})->name('job-seeker.mark-favorite');


// ✅ عرض الوظائف المفضلة
Route::get('/job-seeker/favorite-jobs', function () {
    $favorites = Favorite::with('job')->where('user_id', auth()->id())->get();
    return view('pages.favorites', compact('favorites'));
})->name('job-seeker.favorites');
