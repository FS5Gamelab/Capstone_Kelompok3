@extends('seeker.layout.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Job Finder</h1>
    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Filter Jobs</h5>
            <form action="{{ route('seeker.jobs.index') }}" method="GET" class="filter-form">
                <div class="row align-items-end">
                    <div class="col-md-3 form-group">
                        <label for="categories" class="form-label"><strong>Category:</strong></label>
                        <select name="categories" id="categories" class="form-control">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="location" class="form-label"><strong>Location:</strong></label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="Enter location">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="salary" class="form-label"><strong>Salary:</strong></label>
                        <input type="text" name="salary" id="salary" class="form-control" placeholder="Enter salary">
                    </div>
                    <div class="col-md-3 form-group d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2 w-50">Filter</button>
                        <a href="{{ route('seeker.jobs.index') }}" class="btn btn-secondary w-50">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Job Listings -->
    <div class="row">
        @forelse ($jobs as $job)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $job->jobTitle }}</h5>
                        <p class="card-text flex-grow-1">{{ \Illuminate\Support\Str::limit($job->jobDescription, 100) }}</p>
                        <p class="card-text"><strong>Location:</strong> {{ $job->jobLocation }}</p>
                        <p class="card-text"><strong>Salary:</strong> {{ $job->salary }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ ucfirst($job->jobStatus) }}</p>
                        <p class="card-text"><strong>Posted on:</strong> {{ $job->postedDate }}</p>
                        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary mt-3">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No jobs available.</p>
        @endforelse
    </div>
</div>
@endsection
