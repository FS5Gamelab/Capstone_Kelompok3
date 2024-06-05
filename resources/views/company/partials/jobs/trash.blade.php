@extends('company.main')
@section('konten')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="/company/jobs" class="ms-auto btn btn-success"><i class="fa fa-database" aria-hidden="true"></i> Data Lowongan Pekerjaan</a>
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
                                <th class="text-center">Gaji</th>
                                <th width="12%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $job->jobTitle }}</td>
                                    <td>{{ $job->jobLocation }}</td>
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

                                    <td>Rp. {{ number_format($job->salary, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                            
                                            <a href="{{ route('jobs.restore', $job->id) }}" class="btn btn-sm btn-success"><i class="fa fa-recycle" aria-hidden="true"></i></a>
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
