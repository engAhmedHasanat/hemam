<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Favorite;

class JobController extends Controller
{
    public function index() {
        return Job::with('company')->get();
    }

    public function show($id) {
        return Job::with('company')->findOrFail($id);
    }

    public function favorite(Request $request, $id) {
        Favorite::firstOrCreate([
            'user_id' => auth()->id(),
            'job_id' => $id,
        ]);
        return response()->json(['message' => 'Marked as favorite']);
    }

    public function favorites() {
        return Favorite::with('job')->where('user_id', auth()->id())->get();
    }
}