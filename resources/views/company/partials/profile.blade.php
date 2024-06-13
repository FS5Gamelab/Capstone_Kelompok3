@extends('company.main')
@section('konten')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>{{ $message }}</h5>
        </div>
    @endif
    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>{{ $message }}</h5>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i>{{ $message }}</h5>
        </div>
    @endif
    <div class="row">

        <div class="col col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Account</h3>
                </div>
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ $user->email }}" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                placeholder="Password">

                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputPassword2">Repeat Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                name="password_confirmation" placeholder="Corfirm Password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col col-md-7">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Company Profile</h3>
                </div>
                <form method="POST" action="{{ route('company-profile.update', $company->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan"
                                value="{{ old('nama_perusahaan', $company->companyName) }}">
                            @error('nama_perusahaan')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Detail Perusahaan</label>
                            <textarea class="form-control" name="detail_perusahaan">{{ old('detail_perusahaan', $company->companyDescription) }}</textarea>
                            @error('detail_perusahaan')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat Perusahaan</label>
                            <textarea class="form-control"name="alamat_perusahaan">{{ old('alamat_perusahaan', $company->companyAddress) }}</textarea>
                            @error('alamat_perusahaan')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp', $company->companyPhone) }}"
                                class="form-control" id="no_hp">
                            @error('no_hp')
                                <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
