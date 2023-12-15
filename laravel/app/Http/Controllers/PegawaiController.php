<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'alamat' => '',
            'nohp' => 'required|size:8,unique:pasiens',
            'level' => 'required|min:3|max:50',
            ]);

            $pegawai = new Pegawai();
            $pegawai->name = $validateData['nama'];
            $pegawai->alamat = $validateData['alamat'];
            $pegawai->nohp = $validateData['nohp'];
            $pegawai->level = $validateData['level'];
            $pegawai->save();
            $request->session()->flash('pesan','Penambahan data berhasil');
            return redirect()->route('pegawai.index');
    }

    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index',['pegawai' => $pegawais]);
    }

    public function show($pegawai_id)
    {
        $result = Pegawai::findOrFail($pegawai_id);
        return view('pegawai.show',['pegawai' => $result]);
    }

    public function edit($pegawai_id)
    {
        $result = Pegawai::findOrFail($pegawai_id);
        return view('pegawai.edit',['pegawai' => $result]);
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'alamat' => '',
            'nohp' => 'required|size:8,unique:pasiens',
            'level' => 'required|min:3|max:50',
            ]);

            $pegawai->name = $validateData['nama'];
            $pegawai->alamat = $validateData['alamat'];
            $pegawai->nohp = $validateData['nohp'];
            $pegawai->level = $validateData['level'];
            $pegawai->save();
            $request->session()->flash('pesan','Perubahan data berhasil');
            return redirect()->route('pegawai.index',['pegawai' => $pegawai->id]);
    }

    public function destroy(Request $request, Pegawai $pegawai)
    {
        $pegawai->delete();
        $request->session()->flash('pesan','Hapus data berhasil');
        return redirect()->route('pegawai.index');
    }

}
