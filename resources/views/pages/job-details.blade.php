@extends('pages.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="bg-white shadow rounded p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h2 class="fw-bold text-primary">{{ $job->title }}</h2>
                        <p class="mb-1 text-muted">at <strong>{{ $job->company->name }}</strong></p>
                        <p class="mb-0 text-secondary"><i class="bi bi-geo-alt-fill me-1"></i> {{ $job->location }}</p>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm">← Back</a>
                </div>

                <hr>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <p><strong>Salary:</strong> {{ $job->salary ?? 'Not specified' }}</p>
                        <p><strong>Experience:</strong> {{ $job->experience_years }} years</p>
                        <p><strong>Field:</strong> {{ $job->work_field ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nationality:</strong> {{ $job->nationality ?? 'N/A' }}</p>
                        <p><strong>Gender:</strong> {{ $job->gender_preference ?? 'N/A' }}</p>
                        <p><strong>Posted:</strong> {{ $job->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                <h5 class="fw-semibold mb-2">Job Description</h5>
                <p class="text-dark lh-lg">{{ $job->description }}</p>

                <div class="mt-4 d-flex justify-content-between align-items-center">
                    <form action="{{ route('jobs.favorite', $job->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">♡ Add to Favorites</button>
                    </form>
                    <a href="#" class="btn btn-success">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
