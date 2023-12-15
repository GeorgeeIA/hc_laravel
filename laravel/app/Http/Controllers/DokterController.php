<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required|size:5,unique:dokters',
            'nama' => 'required|min:3|max:50',
            'jeniskelamin' => 'required',
            'alamat' => '',
            'nohp' => 'required',
            'poli' => 'required',
            ]);

            $dokter = new Dokter();
            $dokter->id = $validateData['id'];
            $dokter->name = $validateData['nama'];
            $dokter->jeniskelamin = $validateData['jeniskelamin'];
            $dokter->alamat = $validateData['alamat'];
            $dokter->nohp = $validateData['nohp'];
            $dokter->poli = $validateData['poli'];
            $dokter->save();
            $request->session()->flash('pesan','Penambahan data berhasil');
            return redirect()->route('dokter.index');
    }

    public function index()
    {
        $dokters = Dokter::all();
        return view('dokter.index',['dokter' => $dokters]);
    }

    public function show($dokter_id)
    {
        $result = Dokter::findOrFail($dokter_id);
        return view('dokter.show',['dokter' => $result]);
    }

    public function edit($dokter_id)
    {
        $result = Dokter::findOrFail($dokter_id);
        return view('dokter.edit',['dokter' => $result]);
    }

    public function update(Request $request, Dokter $dokter)
    {
        $validateData = $request->validate([
            'id' => 'required|size:5,unique:dokters',
            'nama' => 'required|min:3|max:50',
            'jeniskelamin' => 'required',
            'alamat' => '',
            'nohp' => 'required',
            'poli' => 'required',
            ]);

            $dokter->id = $validateData['id'];
            $dokter->name = $validateData['nama'];
            $dokter->jeniskelamin = $validateData['jeniskelamin'];
            $dokter->alamat = $validateData['alamat'];
            $dokter->nohp = $validateData['nohp'];
            $dokter->poli = $validateData['poli'];
            $dokter->save();
            $request->session()->flash('pesan','Perubahan data berhasil');
            return redirect()->route('dokter.index',['dokter' => $dokter->id]);
    }

    public function destroy(Request $request, Dokter $dokter)
    {
        $dokter->delete();
        $request->session()->flash('pesan','Hapus data berhasil');
        return redirect()->route('dokter.index');
    }



}
