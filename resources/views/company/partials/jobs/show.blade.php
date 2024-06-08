@extends('company.main')
@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-blue">
                    <h3 class="card-title">Lowongan Kerja</h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Nama Pekerjaan</span>
                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{ $job->jobTitle }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Gaji</span>
                                            <span class="info-box-number text-center text-muted mb-0">Rp.
                                                {{ number_format($job->salary, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Type Pekerjaan</span>
                                            @if ($job->jobType == 'wfh')
                                                <div
                                                    class="info-box-number text-center text-white mb-0 btn btn-secondary rounded-pill">
                                                    {{ $job->jobType }}</div>
                                            @elseif($job->jobType == 'wfo')
                                                <div
                                                    class="info-box-number text-center text-white mb-0 btn btn-primary rounded-pill">
                                                    {{ $job->jobType }}</div>
                                            @else
                                                <div
                                                    class="info-box-number text-center text-white mb-0 btn btn-warning rounded-pill">
                                                    {{ $job->jobType }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Status Pekerjaan</span>
                                            @if ($job->jobStatus == 'buka')
                                                <div
                                                    class="info-box-number text-center text-white mb-0 btn btn-success rounded-pill">
                                                    {{ $job->jobStatus }}</div>
                                            @else
                                                <div
                                                    class="info-box-number text-center text-white mb-0 btn btn-danger rounded-pill">
                                                    {{ $job->jobStatus }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <h5 class="info-box-number  text-muted">Detail Pekerjaan</h5>
                                            <span > {{ $job->jobDescription }}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <h5 class="info-box-number  text-muted">Lokasi Pekerjaan</h5>

                                            <span> <i class="fa fa-map-pin" aria-hidden="true"></i>
                                                {{ $job->jobLocation }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-blue">
                    <h3 class="card-title">Data Pelamar</h3>
                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Pelamar</th>
                                <th class="text-center">No.Hp Pelamar</th>
                                <th class="text-center">Skill Pelamar</th>
                                <th class="text-center">Resume Pelamar</th>
                                <th class="text-center">Alamat Pelamar</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $application->seeker->fullName }}</td>
                                    <td> {{ $application->seeker->phone }}</td>
                                    <td class="text-center">
                                        {{ $application->seeker->skills }}
                                    </td>
                                    <td class="text-center">
                                        {{ $application->seeker->resume }}
                                    </td>
                                    <td class="text-center">{{ $application->seeker->address }}</td>
                                    <td>
                                        @if($application->status == 'pending')
                                        <strong class="bg-warning  px-2 rounded-pill">
                                            {{ $application->status }}
                                        </strong>
                                        @elseif($application->status == 'accepted')
                                        <strong class="bg-success  px-2 rounded-pill">
                                            {{ $application->status }}
                                        </strong>
                                        @elseif($application->status == 'rejected')
                                        <strong class="bg-danger  px-2 rounded-pill">
                                            {{ $application->status }}
                                        </strong>
                                        @else
                                        <strong class="bg-primary  px-2 rounded-pill">
                                            {{ $application->status }}
                                        </strong>
                                        @endif
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('applications.destroy', $application->id) }}" method="POST">
                                            <a href="{{ route('applications.show', $application->id) }}"
                                                class="btn btn-sm btn-dark"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{ route('applications.edit', $application->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"
                                                    aria-hidden="true"></i></a>
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
