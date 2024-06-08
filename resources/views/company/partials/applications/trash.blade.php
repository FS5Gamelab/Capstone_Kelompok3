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
                    <a href="/applications" class="ms-auto btn btn-success"><i class="fa fa-database" aria-hidden="true"></i> Data Lowongan Pekerjaan</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Pekerjaan</th>
                                <th class="text-center">Nama Pelamar</th>
                                <th class="text-center">No.Hp Pelamar</th>
                                <th class="text-center">Skills</th>
                                <th class="text-center">Resume</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Status</th>
                                <th width="12%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trashedApplications as $a)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $a->job->jobTitle }}</td>
                                    <td>{{ $a->seeker->fullName }}</td>
                                    <td class="text-center">
                                        {{ $a->seeker->phone }}
                                    </td>
                                    <td class="text-center">
                                        {{ $a->seeker->skills }}
                                    </td>
                                    <td class="text-center"> {{ $a->seeker->resume }} </td>
                                    <td> {{ $a->seeker->address }} </td>
                                    <td>
                                        @if ($a->status == 'pending')
                                            <strong class="bg-warning  px-2 rounded-pill">
                                                {{ $a->status }}
                                            </strong>
                                        @elseif($a->status == 'accepted')
                                            <strong class="bg-success  px-2 rounded-pill">
                                                {{ $a->status }}
                                            </strong>
                                        @elseif($a->status == 'rejected')
                                            <strong class="bg-danger  px-2 rounded-pill">
                                                {{ $a->status }}
                                            </strong>
                                        @else
                                            <strong class="bg-primary  px-2 rounded-pill">
                                                {{ $a->status }}
                                            </strong>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Permanen ?');"
                                        action="" method="POST">
                                        {{-- {{ route('applications.deletepermanently', $a->id) }}" --}}
                                        <a href="{{ route('applications.restore', $a->id) }}" class="btn btn-sm btn-success"><i class="fa fa-recycle" aria-hidden="true"></i></a>
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
