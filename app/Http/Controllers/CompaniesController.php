<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        $company = $user->companies;
        return view('company.partials.profile', [
            'user'=> $user,
            'company' => $company,
          
        ]);
    }

    public function edit(Companies $companies)
    {
        //
    }

   public function show($id){

   }
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $company = $user->companies->id;
        $this->validate($request, [
            'nama_perusahaan'     => 'required',
            // 'detail_perusahaan'   => 'required',
            // 'alamat_perusahaan'   => 'required',
            // 'no_hp'   => 'required',
        ]);
        $perusahaan = Companies::findOrFail($company);
        $perusahaan->update([
            'companyName'     => $request->nama_perusahaan,
            // 'companyDescription'   => $request->detail_perusahaan,
            // 'companyAddress'     => $request->alamat_perusahaan,
            // 'companyPhone'     => $request->no_hp,
        ]);

        return redirect('/company-profile')->with(['success' => 'Data Berhasil Diubah!']);
    }

}
