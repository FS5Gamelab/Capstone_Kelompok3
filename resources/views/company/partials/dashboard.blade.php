@extends('company.main')
@section('konten')
<div class="row">
    <div class="col-sm-12">
        @if ($peringatan)
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-circle"></i>{{ $peringatan }}</h5>
            </div>
        @endif
    </div>
</div>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jumlah_jobs }} Lowongan</h3>

                    <p>Lowongan Kerja</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $jumlah_seekers }} Pelamar</h3>
                    <p>Pelamar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $jumlah_diterima }} Orang</h3>

                    <p>Diterima</p>
                </div>
                <div class="icon">
                    <i class="ion ion-checkmark-circled"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $jumlah_ditolak }} Orang</h3>
                    <p>Ditolak</p>
                </div>
                <div class="icon">
                    <i class="ion ion-alert-circled"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection
