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
    @if ($message = Session::get('danger'))
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
                    <a  href="{{ route('jobs.trash') }}" class="float-right btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Sampah</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="2%" class="text-center">No</th>
                                <th class="text-center">Nama Pekerjaan</th>
                                <th class="text-center">Lokasi Pekerjaan</th>
                                <th width="8%" class="text-center">Type Pekerjaan</th>
                                <th width="8%" class="text-center">Status Pekerjaan</th>
                                <th width="8%" class="text-center" >Jumlah Pelamar</th>
                                <th class="text-center">Gaji</th>
                                <th width="15%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td >{{ $job->jobTitle }}</td>
                                 
                                    <td ><textarea rows="2" style="width: 100%; background: transparent; border: none;" readonly>{{ $job->jobLocation }}</textarea></td>
                                    <td class="text-center">
                                        @if ($job->jobType == 'wfh')
                                        <strong class="bg-secondary  px-2 rounded-pill">
                                            {{ $job->jobType }}
                                        </strong>
                                        @elseif($job->jobType == 'wfo')
                                            <strong class="bg-primary  px-2 rounded-pill">
                                                {{ $job->jobType }}
                                            </strong>
                                        @else
                                            <strong class="bg-warning  px-2 rounded-pill">
                                                {{ $job->jobType }}
                                            </strong>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($job->jobStatus == 'buka')
                                            <strong class="bg-success px-3 rounded-pill">
                                                {{ $job->jobStatus }}
                                            </strong>
                                        @else
                                            <strong class="bg-danger px-3 rounded-pill">
                                                {{ $job->jobStatus }}
                                            </strong>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $jml_application[$job->id] }}</td>
                                    <td >Rp. {{ number_format($job->salary, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                            <a href="/company-jobs-show/{{  $job->id }}" class="btn btn-sm btn-dark"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
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
