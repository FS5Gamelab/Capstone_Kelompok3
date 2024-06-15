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
<<<<<<< HEAD
                        <span class="badge badge-warning">{{ $application->status }}</span>
                    @elseif ($application->status == 'accepted')
                        <span class="badge badge-success">{{ $application->status }}</span>
                    @elseif ($application->status == 'rejected')
                        <span class="badge badge-danger">{{ $application->status }}</span>
                    @else
                        <span class="badge badge-secondary">{{ $application->status }}</span>
=======
                        <span class="badge bg-warning text-dark">{{ $application->status }}</span>
                    @elseif ($application->status == 'accepted')
                        <span class="badge bg-success">{{ $application->status }}</span>
                    @elseif ($application->status == 'rejected')
                        <span class="badge bg-danger">{{ $application->status }}</span>
                    @elseif ($application->status == 'in_review')
                        <span class="badge bg-info">{{ $application->status }}</span>
                    @else
                        <span class="badge bg-secondary">{{ $application->status }}</span>
>>>>>>> 9583c031d6401a3c18559d6f97942a78afddb1a6
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
