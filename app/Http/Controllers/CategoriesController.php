<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Categories::all();
        return view('company.partials.categories.index', [
            'categories' => $categories,
            'title' => 'Kategori',
            'perusahaan' => User::findOrFail(Auth::user()->id)->companies->companyName
        ]);
    }

    public function create()
    {
        return view('company.partials.categories.create', ['title' => 'Kategori']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori'     => 'required',
            'deskripsi_kategori'   => 'required',
        ]);
        Categories::create([
            'categoryName'     => $request->nama_kategori,
            'categoryDescription'   => $request->deskripsi_kategori,

        ]);
        return redirect('/company-category')->with(['success' => 'Kategori Berhasil DItambahkan!']);
    }


    public function edit($id)
    {
        return view('company.partials.categories.edit', [
            'category' => Categories::findOrFail($id),
            'title' => 'Kategori',
            'perusahaan' => User::findOrFail(Auth::user()->id)->companies->companyName
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori'     => 'required',
            'deskripsi_kategori'   => 'required',
        ]);
        $category = Categories::findOrFail($id);
        $category->update([
            'categoryName'     => $request->nama_kategori,
            'categoryDescription'   => $request->deskripsi_kategori,

        ]);
        return redirect('/company-category')->with(['success' => 'Kategori Berhasil Diupdate!']);
    }

    public function destroy($id)
    {
        $job = Categories::findOrFail($id);
        $job->delete();
        return redirect('/company-category')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function trash()
    {
        $categories = Categories::onlyTrashed()->get();
        return view('company.partials.categories.trash', [
            'categories' => $categories,
            'title' => 'Kategori',
            'perusahaan' => User::findOrFail(Auth::user()->id)->companies->companyName
        ]);
    }

    public function restore($id)
    {
        $category = Categories::onlyTrashed()->where('id', $id);
        $category->restore();
        return redirect('/company-category')->with(['success' => 'Data Berhasil Dipulihkan!']);
    }
}
