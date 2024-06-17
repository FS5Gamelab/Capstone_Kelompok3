@extends('company.main')
@section('konten')
    <div class="row">
        <div class="col col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Lamaran Pekerjaan</h3>
                    </ul>
                </div>
                <form method="POST" action="{{ route('applications.update', $application->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="seeker_name">Nama Pelamar </label>
                            <input type="text" value="{{ old('seeker_name', $application->seeker->fullName) }}"
                                class="form-control  @error('seeker_name') is-invalid @enderror" name="seeker_name"
                                id="seeker_name" disabled>
                            @error('seeker_name')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="seeker_address">Alamat Pelamar </label>
                            <input type="text" value="{{ old('seeker_address', $application->seeker->address) }}"
                                class="form-control  @error('seeker_address') is-invalid @enderror" name="seeker_address"
                                id="seeker_address" disabled>
                            @error('seeker_address')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="seeker_phone">No. Hp Pelamar </label>
                            <input type="text" value="{{ old('seeker_phone', $application->seeker->phone) }}"
                                class="form-control  @error('seeker_phone') is-invalid @enderror" name="seeker_phone"
                                id="seeker_phone" disabled>
                            @error('seeker_phone')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="seeker_skills">Skill Pelamar </label>
                            <input type="text" value="{{ old('seeker_skills', $application->seeker->skills) }}"
                                class="form-control  @error('seeker_skills') is-invalid @enderror" name="seeker_skills"
                                id="seeker_skills" disabled>
                            @error('seeker_skills')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="seeker_resume">Resume Pelamar </label>

                            <a class="bg-secondary  px-2 rounded-pill" href="{{ asset('storage/'.$application->seeker->resume) }}" target="_blank">Buka Resume</a
                        </div>
                        <div class="form-group">
                            <label for="status">CV Pelamar</label><br>
                            <a class="bg-secondary  px-2 rounded-pill" href="{{ asset('storage/'.$application->cv) }}" target="_blank">Buka PDF</a>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Lamaran</label>
                            <select name="status" id="status" class="form-control">
                                <option value="pending"
                                    {{ old('status', $application->status) == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="accepted"
                                    {{ old('status', $application->status) == 'accepted' ? 'selected' : '' }}>Accepted
                                </option>
                                <option value="rejected"
                                    {{ old('status', $application->status) == 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                                <option value="in review"
                                    {{ old('status', $application->status) == 'in review' ? 'selected' : '' }}>In Review
                                </option>
                            </select>
                            @error('status')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>

            </div>
            <ul>
        </div>
    </div>
@endsection
