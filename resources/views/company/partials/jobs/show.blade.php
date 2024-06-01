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
                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{ $job->jobType }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Status Pekerjaan</span>
                                            <div class="info-box-number text-center text-white mb-0 btn btn-success rounded-pill">{{ $job->jobStatus }}</div>
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
                                            
                                            <span class="info-box-text "> <i class="fa fa-map-pin" aria-hidden="true"></i>  {{ $job->jobLocation }}</span>
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
@endsection
