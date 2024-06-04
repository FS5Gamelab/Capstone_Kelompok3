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
                                            <span class="info-box-text "> {{ $job->jobDescription }}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <h5 class="info-box-number  text-muted">Lokasi Pekerjaan</h5>

                                            <span class="info-box-text "> <i class="fa fa-map-pin" aria-hidden="true"></i>
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
                    <h3 class="card-title">Pelamar</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        @if ($applications && $applications->isNotEmpty())
                            @foreach ($applications as $application)
                                @php
                                    $randomClass = $classes[array_rand($classes)];
                                @endphp
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon {{ $randomClass }}"><i
                                                class="far  fa-user"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">
                                                {{ $application->seeker->fullName }}
                                            </span>
                                            <span class="info-box-number"> {{ $application->seeker->phone }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <div class="mx-auto">
                            <h5>No applications found.</h5>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
