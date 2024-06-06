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
                                <th width="12%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $a)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td >{{ $a->job_id }}</td>
                                    <td >{{ $a->seeker_id }}</td>
                                    <td class="text-center">
                                        {{ $a->seeker_id }}
                                    </td>
                                    <td class="text-center">
                                      {{ $a->status }}
                                    </td>
                                    <td class="text-center"> {{ $a->seeker_id }} </td>
                                    <td > {{ $a->seeker_id }} </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('applications.destroy', $a->id) }}" method="POST">
                                            <a href="{{ route('applications.show', $a->id) }}" class="btn btn-sm btn-dark"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{ route('applications.edit', $a->id) }}" class="btn btn-sm btn-primary"><i
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
