<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = [
                'title' => 'Kelola Periode',
                'periode' => Periode::all(),
            ];
            return view('periode.index', $data);
        } catch (\Throwable $th) {
            return redirect('periode.index')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|min:4',

        ], [
            'judul.required' => 'Judul Harus diisi',
            'judul.min' => 'Judul Harus 4 digit huruf ataupun angka',
        ]);

        $periode = new Periode();
        $periode->judul = $request->judul;
        $periode->ket = $request->ket;
        $periode->status = 0;
        $periode->save();
        return redirect('periode')->with('success', 'Periode berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Periode $periode)
    {
        try {
            $data = [
                'title' => 'Ubah Periode',
                'periode' => $periode,
            ];
            return view('periode.edit', $data);
        } catch (\Throwable $th) {
            return redirect('periode')->with('gagal', 'Halaman Gagal Diakses');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string|min:4',

        ], [
            'judul.required' => 'Judul Harus diisi',
            'judul.min' => 'Judul Harus 4 digit huruf ataupun angka',
        ]);

        $periode = Periode::findOrFail($id);
        $periode->update([
            'judul' => $request->judul,
            'ket' => $request->ket,
        ]);
        return redirect('periode')->with('success', 'Periode berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // di hiden soalnya periode enga mau di hapus
        // try {
        //     Periode::destroy($id);
        //     return redirect('periode')->with('success', 'Obat dan Aktual berhasil dihapus');
        // } catch (\Throwable $th) {
        //     return redirect('periode')->with('gagal', 'Periode dan Aktual gagal dihapus');
        // }
    }
}
