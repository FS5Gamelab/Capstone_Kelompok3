@extends('seeker.layout.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-5">
            <!-- Account Update Section -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title"><i class="bi bi-person-circle me-2"></i>Account</h3>
                </div>
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="email"><i class="bi bi-envelope me-2"></i>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ $user->email }}" placeholder="Enter email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1"><i class="bi bi-lock me-2"></i>Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                placeholder="Password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword2"><i class="bi bi-lock-fill me-2"></i>Repeat Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                name="password_confirmation" placeholder="Confirm Password">
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Change Password</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <!-- Seeker Profile Update Section -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title"><i class="bi bi-person-fill me-2"></i>Seeker Profile</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('seeker.profile.update', ['seekerId' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="fullName"><i class="bi bi-person me-2"></i>Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" value="{{ old('fullName', $profile->fullName ?? '') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address"><i class="bi bi-geo-alt me-2"></i>Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $profile->address ?? '') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone"><i class="bi bi-telephone me-2"></i>Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $profile->phone ?? '') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="skills"><i class="bi bi-tools me-2"></i>Skills</label>
                            <input type="text" class="form-control" id="skills" name="skills" value="{{ old('skills', $profile->skills ?? '') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="resume"><i class="bi bi-file-earmark-text me-2"></i>Resume</label>
                            <input type="file" class="form-control" id="resume" name="resume" accept=".pdf">
                            @if ($profile->resume ?? false)
                                <p>Current Resume: <a href="{{ asset('storage/' . $profile->resume) }}" target="_blank">{{ $profile->resume }}</a></p>
                            @endif
                            @error('resume')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="profile"><i class="bi bi-person-badge me-2"></i>Profile</label>
                            <input type="text" class="form-control" id="profile" name="profile" value="{{ old('profile', $profile->profile ?? '') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
