@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">{{ $job->jobTitle }}</h1>
            <p>{{ $job->jobDescription }}</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Requirements:</strong> {{ $job->jobRequire }}</li>
                <li class="list-group-item"><strong>Location:</strong> {{ $job->jobLocation }}</li>
                <li class="list-group-item"><strong>Type:</strong> {{ $job->jobType }}</li>
                <li class="list-group-item"><strong>Salary:</strong> {{ 'Rp '.number_format($job->salary) }}</li>
                <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($job->jobStatus) }}</li>
                <li class="list-group-item"><strong>Posted on:</strong> {{ $job->postedDate }}</li>
            </ul>

            <h2 class="my-4">Apply for this Job</h2>
            @auth
                <form action="{{ route('seeker.applications.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    <input type="hidden" name="jobs_id" value="{{ $jobs->id }}">
                    <input type="hidden" name="seeker_id" value="{{ auth()->user()->seeker->id }}">
                    <div class="mb-3">
                        <label for="cv" class="form-label">Upload CV:</label>
                        <input type="file" name="cv" id="cv" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Apply</button>
                </form>
            @endauth

            <h2 class="my-4">Applications</h2>
            <ul class="list-group">
                @foreach ($job->applications as $application)
                    <li class="list-group-item">
                        <p><strong>Applicant:</strong> {{ $application->seeker->name }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>
                        <p><strong>Applied on:</strong> {{ $application->applicationDate }}</p>
                        <p><strong>CV:</strong> <a href="{{ asset('storage/' . $application->cv) }}" class="btn btn-primary">Download</a></p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
