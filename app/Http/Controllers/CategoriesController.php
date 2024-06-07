<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('company.partials.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('company.partials.categories.create');
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

    public function show(Categories $categories)
    {
        //
    }

    public function edit($id)
    {
        return view('company.partials.categories.edit', [
            'category' => Categories::findOrFail($id)
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
        return view('company.partials.categories.trash', ['categories' => $categories]);
    }

    public function restore($id)
    {
        $category = Categories::onlyTrashed()->where('id', $id);
        $category->restore();
        return redirect('/company-category')->with(['success' => 'Data Berhasil Dipulihkan!']);
    }

    public function deletepermanently($id)
    {
        $category = Categories::onlyTrashed()->where('id', $id);
        $category->forceDelete();
        return redirect('/company-category')->with(['success' => 'Data Dihapus Permanen']);
    }
}
