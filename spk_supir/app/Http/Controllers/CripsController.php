<?php

namespace App\Http\Controllers;


use App\Models\Crips;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class CripsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_crips' => 'required|string',
            'bobot' => 'required|numeric',

        ], [
            'nama_crips.required' => 'Nama Crips Harus diisi !',
            'bobot.required' => 'Bobot Harus diisi !',
            'bobot.numeric' => 'Bobot Harus berisi dengan angka',
        ]);

        $crips = new Crips();
        $crips->kriteria_id = $request->kriteria_id;
        $crips->nama_crips = $request->nama_crips;
        $crips->bobot = $request->bobot;
        $crips->save();
        return redirect('/kriteria/' . $request->kriteria_id)->with('success', 'Crips berhasil ditambahkan');
        // return redirect('crips')->with('success', 'Crips berhasil ditambahkan');
    }
    public function edit($id)
    {
        $crips = Crips::findOrFail($id);
        $data = [
            'title' => 'Edit Crips',
            'crips' => $crips,
        ];
        return view('crips.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $crips = Crips::findOrFail($id);
            $crips->update([
                'nama_crips' => $request->nama_crips,
                'bobot' => $request->bobot,
            ]);
        return redirect('/kriteria/' . $request->kriteria_id)->with('success', 'Crips berhasil ditambahkan');

        } catch (\Throwable $th) {
        }
    }

    public function destroy($id)
    {
        try {
            Crips::destroy($id);
        } catch (\Throwable $th) {
            return redirect('/kriteria')->with('gagal', 'Crips gagal dihapus');
        }
    }
}
