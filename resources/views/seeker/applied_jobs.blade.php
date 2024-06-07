<!-- resources/views/seekers/applied_jobs.blade.php -->
@extends('seeker.layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Jobs Applied</h2>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Job Title</th>
                <th>Application Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
            <tr>
                <td>{{ $application->job->jobTitle }}</td>
                <td>{{ $application->applicationDate }}</td>
                <td>{{ $application->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
