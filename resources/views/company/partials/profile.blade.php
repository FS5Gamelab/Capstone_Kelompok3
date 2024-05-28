@extends('company.main')
@section('konten')
    <div class="row">
        <div class="col col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Account</h3>
                </div>
                <form method="post" action="{{ route('profile.update') }}" >
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" id="username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Repeat Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
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
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" value="{{ $company->companyName }}">
                        </div>
                        <div class="form-group">
                            <label>Detail Perusahaan</label>
                            <textarea class="form-control"  name="detail_perusahaan">{{ $company->companyDescription }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Alamat Perusahaan</label>
                            <textarea class="form-control"name="alamat_perusahaan">{{ $company->companyAddress }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="text" value="{{ $company->companyPhone }}"  class="form-control" id="no_hp">
                        </div>
                        
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
