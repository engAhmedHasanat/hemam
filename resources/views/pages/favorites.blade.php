@extends('pages.app')

@section('title', 'My Favorite Jobs')

@section('content')
<h2 class="mb-4 text-success">Saved Jobs</h2>

@forelse ($favorites as $fav)
  <div class="card mb-3 border-success">
    <div class="card-body">
      <h5 class="card-title">{{ $fav->job->title }}</h5>
      <p class="card-text">{{ \Illuminate\Support\Str::limit($fav->job->description, 100) }}</p>
      <a href="{{ route('jobs.details', $fav->job->id) }}" class="btn btn-success btn-sm">View Job</a>
    </div>
  </div>
@empty
  <div class="alert alert-warning">No favorite jobs yet.</div>
@endforelse
@endsection
