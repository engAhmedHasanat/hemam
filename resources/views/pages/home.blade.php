@extends('pages.app')

@section('content')
<style>
    .hero-section {
        background: linear-gradient(90deg, #1e3c72, #2a5298);
        color: white;
        padding: 4rem 0;
        text-align: center;
    }
    .card-job {
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: 0.3s ease-in-out;
    }
    .card-job:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }
</style>

<div class="hero-section">
    <div class="container">
        <h1>Welcome to Hemam Job Portal</h1>
        <p>Find your dream job today. Search hundreds of opportunities across multiple fields.</p>
        <a href="{{ route('home') }}" class="btn btn-light mt-4 px-4 py-2 fw-bold">Browse Jobs</a>
    </div>
</div>

<div class="container py-5">
    <h2 class="mb-4 text-primary">Latest Job Listings</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($jobs as $job)
            <div class="col">
                <div class="card card-job h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job['title'] }}</h5>
                        <p class="card-text">{{ $job['description'] }}</p>
                        <a href="{{ route('jobs.details', $job->id) }}" class="btn btn-outline-primary">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No jobs found.</p>
        @endforelse
    </div>
</div>
@endsection
