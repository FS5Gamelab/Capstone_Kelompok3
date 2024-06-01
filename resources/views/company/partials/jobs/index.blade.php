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
                    <a href="{{ route('jobs.create') }}" class="btn btn-primary"><i class=" fa fa-plus-circle"
                            aria-hidden="true"></i> Buka Lowongan Pekerjaan</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pekerjaan</th>
                                <th>Lokasi Pekerjaan</th>
                                <th>Type Pekerjaan</th>
                                <th>Status Pekerjaan</th>
                                <th>Gaji</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $job->jobTitle }}</td>
                                    <td>{{ $job->jobLocation }}</td>
                                    <td>{{ $job->jobType }}</td>
                                    <td>
                                        @if($job->jobStatus =='buka')
                                        <div class="btn btn-success">
                                            {{ $job->jobStatus }}
                                        </div>
                                        @else
                                        <div class="btn btn-danger">
                                            {{ $job->jobStatus }}
                                        </div>
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($job->salary, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                            <a href="{{ route('jobs.show', $job->id) }}"
                                                class="btn btn-sm btn-dark"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{ route('jobs.edit', $job->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
