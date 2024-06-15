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
                    <a href="{{ route('company-category.create') }}" class="btn btn-primary"><i class=" fa fa-plus-circle"
                            aria-hidden="true"></i>Tambah Kategori</a>
                    <a href="{{ route('company-category.trash') }}" class="float-right ms-auto btn btn-danger"><i class="fa fa-trash"
                            aria-hidden="true"></i>Sampah</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th width="20%" class="text-center">Nama Kategori</th>
                                <th class="text-center">Deskripsi Kategori</th>
                                <th width="12%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $category->categoryName }}</td>
                                    
                                    <td>
                                        <textarea rows="4" style="width: 100%; background: transparent; border: none;" readonly>{{ $category->categoryDescription }}</textarea>
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('company-category.destroy', $category->id) }}" method="POST">
                                            <a href="{{ route('company-category.edit', $category->id) }}"
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
