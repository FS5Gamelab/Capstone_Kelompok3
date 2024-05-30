@extends('company.main')
@section('konten')

@if ($message = Session::get('success'))

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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('jobs.create') }}" class="btn btn-primary"><i class=" fa fa-plus-circle" aria-hidden="true"></i> Buka Lowongan Pekerjaan</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pekerjaan</th>
                                <th>Deskripsi Pekerjaan</th>
                                <th>Syarat Pekerjaan</th>
                                <th>Type Pekerjaan</th>
                                <th>Gaji</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $job->jobTitle }}</td>
                                    <td>{{$job->jobDescription}}</td>
                                    <td>{{$job->jobRequire}}</td>
                                    <td>{{$job->jobLocation}}</td>
                                    <td>{{$job->jobType}}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                            <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                              
                            </tr>
                           @endforeach
                        </tbody>  
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
