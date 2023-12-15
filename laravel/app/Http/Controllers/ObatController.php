<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'stok' => 'required',
            'type' => 'required',
            'harga' => 'required',
            'kadaluarsa' => 'required',
            ]);

            $obat = new Obat();
            $obat->name = $validateData['nama'];
            $obat->stok = $validateData['stok'];
            $obat->type = $validateData['type'];
            $obat->harga = $validateData['harga'];
            $obat->kadaluarsa = $validateData['kadaluarsa'];
            $obat->save();
            $request->session()->flash('pesan','Penambahan data berhasil');
            return redirect()->route('obat.index');
    }

    public function index()
    {
        $obats = Obat::all();
        return view('obat.index',['obat' => $obats]);
    }
    
    public function show($obat_id)
    {
        $result = Obat::findOrFail($obat_id);
        return view('obat.show',['obat' => $result]);
    }

    public function edit($obat_id)
    {
        $result = Obat::findOrFail($obat_id);
        return view('obat.edit',['obat' => $result]);
    }

    public function update(Request $request, Obat $obat)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'stok' => 'required',
            'type' => 'required',
            'harga' => 'required',
            'kadaluarsa' => 'required',
            ]);

            $obat->name = $validateData['nama'];
            $obat->stok = $validateData['stok'];
            $obat->type = $validateData['type'];
            $obat->harga = $validateData['harga'];
            $obat->kadaluarsa = $validateData['kadaluarsa'];
            $obat->save();
            $request->session()->flash('pesan','Perubahan data berhasil');
            return redirect()->route('obat.index',['obat' => $obat->id]);
    }

    public function destroy(Request $request, Obat $obat)
    {
        $obat->delete();
        $request->session()->flash('pesan','Hapus data berhasil');
        return redirect()->route('obat.index');
    }


}
