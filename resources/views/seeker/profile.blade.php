@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1>Seeker Profile</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('seeker.profile.update', ['seekerId' => $profile->user_id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" value="{{ $profile->fullName }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $profile->address }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $profile->phone }}" required>
        </div>

        <div class="form-group">
            <label for="skills">Skills</label>
            <input type="text" class="form-control" id="skills" name="skills" value="{{ $profile->skills }}" required>
        </div>

        <div class="form-group">
            <label for="resume">Resume</label>
            <input type="text" class="form-control" id="resume" name="resume" value="{{ $profile->resume }}" required>
        </div>

        <div class="form-group">
            <label for="profile">Profile</label>
            <input type="text" class="form-control" id="profile" name="profile" value="{{ $profile->profile }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
