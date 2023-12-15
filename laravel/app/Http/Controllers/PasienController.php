<?php

namespace App\Http\Controllers;
use App\Models\Pasien;
use Illuminate\Http\Request;
use File;

class PasienController extends Controller
{
    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'nik' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => '',
            'nohp' => 'required',
            'image' => 'required|file|image|max:1000',
            ]);

            $pasien = new Pasien();
            $pasien->name = $validateData['nama'];
            $pasien->nik = $validateData['nik'];
            $pasien->jeniskelamin = $validateData['jeniskelamin'];
            $pasien->alamat = $validateData['alamat'];
            $pasien->nohp = $validateData['nohp'];
            if($request->hasFile('image'))
            {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'user-'.time().".".$extFile;
            $path = $request->image->move('assets/imagesKTP',$namaFile);
            $pasien->image = $path;
            }
            $pasien->save();
            $request->session()->flash('pesan','Penambahan data berhasil');
            return redirect()->route('pasien.index');

    }

    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.index',['pasien' => $pasiens]);
    }

    public function show($pasien_id)
    {
        $result = Pasien::findOrFail($pasien_id);
        return view('pasien.show',['pasien' => $result]);
    }

    public function edit($pasien_id)
    {
        $result = Pasien::findOrFail($pasien_id);
        return view('pasien.edit',['pasien' => $result]);
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'nik' => 'required',
            'jeniskelamin' => 'required',
            'alamat' => '',
            'nohp' => 'required',
            'image' => 'file|image|max:1000',
            ]);

            $pasien->name = $validateData['nama'];
            $pasien->nik = $validateData['nik'];
            $pasien->jeniskelamin = $validateData['jeniskelamin'];
            $pasien->alamat = $validateData['alamat'];
            $pasien->nohp = $validateData['nohp'];
            if($request->hasFile('image'))
            {
                $extFile = $request->image->getClientOriginalExtension();
                $namaFile = 'user-'.time().".".$extFile;
                File::delete($pasien->image);
                $path = $request->image->move('assets/imagesKTP',$namaFile);
                $pasien->image = $path;
            }
            $pasien->save();
            $request->session()->flash('pesan','Perubahan data berhasil');
            return redirect()->route('pasien.index',['pasien' => $pasien->id]);
    }

    public function destroy(Request $request, Pasien $pasien)
    {
        File::delete($pasien->image);
        $pasien->delete();
        $request->session()->flash('pesan','Hapus data berhasil');
        return redirect()->route('pasien.index');
    }

}
