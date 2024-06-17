@extends('seeker.layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4"><i class="bi bi-briefcase me-2"></i>Jobs Applied</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
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
                <td>
                    @if ($application->status == 'pending')
                        <span class="badge badge-warning">{{ ucfirst($application->status) }}</span>
                    @elseif ($application->status == 'accepted')
                        <span class="badge badge-success">{{ ucfirst($application->status) }}</span>
                    @elseif ($application->status == 'rejected')
                        <span class="badge badge-danger">{{ ucfirst($application->status) }}</span>
                    @else
                        <span class="badge badge-secondary">{{ ucfirst($application->status) }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
