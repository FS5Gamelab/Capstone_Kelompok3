@extends('seeker.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="card my-4">
                    <div class="card-body">
                        <h1 class="card-title">{{ $jobs->jobTitle }}</h1>
                        <p class="card-text">{{ $jobs->jobDescription }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Requirements:</strong> {{ $jobs->jobRequire }}</li>
                            <li class="list-group-item"><strong>Location:</strong> {{ $jobs->jobLocation }}</li>
                            <li class="list-group-item"><strong>Type:</strong> {{ $jobs->jobType }}</li>
                            <li class="list-group-item"><strong>Salary:</strong> {{ 'Rp '.number_format($jobs->salary) }}</li>
                            <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($jobs->jobStatus) }}</li>
                            <li class="list-group-item"><strong>Posted on:</strong> {{ $jobs->postedDate }}</li>
                        </ul>
                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-body">
                        <h2 class="card-title">Apply for this Job</h2>
                        @auth
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('seeker.applications.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="job_id" value="{{ $job->id }}">

                                <div class="mb-3">
                                    <label for="cv" class="form-label">Upload CV:</label>
                                    <input type="file" name="cv" id="cv" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-success">Apply</button>
                            </form>
                        @else
                            <p>Please <a href="{{ route('login') }}">login</a> to apply for this job.</p>
                        @endauth
                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-body">
                        <h2 class="card-title">Applications</h2>
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

            </div>
        </div>
    </div>
@endsection
