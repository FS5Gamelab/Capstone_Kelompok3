
@extends('layout.app')

@section('content')
    <div class="profile-container">
        <h1>Edit Profile</h1>
        <form action="{{ route('seeker.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="profile-info">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" value="{{ old('fullName') ?? $seeker->fullName }}" placeholder="Enter your full name" required>
            </div>

            <div class="profile-info">
                <label for="address">Address:</label>
                <textarea id="address" name="address" placeholder="Enter your address" required>{{ old('address') ?? $seeker->address }}</textarea>
            </div>

            <div class="profile-info">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') ?? $seeker->phone }}" placeholder="Enter your phone number" required>
            </div>

            <div class="profile-info">
                <label for="skills">Skills:</label>
                <textarea id="skills" name="skills" placeholder="Enter your skills (comma separated)" required>{{ old('skills') ?? $seeker->skills }}</textarea>
            </div>

            <div class="profile-info">
                <label for="resume">Upload Resume (CV):</label>
                <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx">
            </div>

            <div class="profile-info">
                <label for="profile">Upload Profile Picture:</label>
                <input type="file" id="profile" name="profile" accept="image/*">
            </div>

            <button class="button" type="submit">Save Profile</button>
        </form>
    </div>
@endsection
