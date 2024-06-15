
@extends('layout.app')

@section('content')
    <div class="profile-container">
        <h1>User Profile</h1>
        <div class="profile-info">
            <p><strong>Full Name:</strong> {{ $seeker->fullName }}</p>
            <p><strong>Address:</strong> {{ $seeker->address }}</p>
            <p><strong>Phone:</strong> {{ $seeker->phone }}</p>
            <p><strong>Skills:</strong> {{ $seeker->skills }}</p>
            <p><strong>Resume:</strong> <a href="{{ asset('storage/' . $seeker->resume) }}">Download Resume</a></p>
            <p><strong>Profile Picture:</strong> <img src="{{ asset('storage/' . $seeker->profile) }}" alt="Profile Picture" style="max-width: 200px;"></p>
        </div>
        <a href="{{ route('seeker.profile.edit') }}" class="button">Edit Profile</a>
    </div>
@endsection
