<!-- resources/views/profile/edit.blade.php -->

@extends('seeker.layout.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>

    @if (session('status') == 'profile-updated')
        <div class="alert alert-success">
            Profile updated successfully!
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
    </form>

    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')

        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger">Delete Account</button>
        </div>
    </form>
</div>
@endsection
