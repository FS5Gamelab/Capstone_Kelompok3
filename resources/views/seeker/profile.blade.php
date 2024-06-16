@extends('seeker.layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Account</h3>
                </div>
                <form method="post" action="{{ route('profile.update', $seekerId) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}" placeholder="Enter email" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Repeat Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation" placeholder="Repeat Password">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <form method="post" action="{{ route('profile.updatep', $seekerId) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control" name="fullName" id="fullName" value="{{ old('fullName', $profile->fullName ?? '') }}">
                            @error('fullName')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3">{{ old('address', $profile->address ?? '') }}</textarea>
                            @error('address')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', $profile->phone ?? '') }}">
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="skills">Skills</label>
                            <input type="text" class="form-control" name="skills" id="skills" value="{{ old('skills', $profile->skills ?? '') }}">
                            @error('skills')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="resume">Resume</label>
                            <input type="file" class="form-control-file" name="resume" id="resume">
                            @error('resume')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @if ($profile && $profile->resume)
                                <a href="{{ route('resume.view', $seekerId) }}" class="btn btn-secondary mt-2">View Resume</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
