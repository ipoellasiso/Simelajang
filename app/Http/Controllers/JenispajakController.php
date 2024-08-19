<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jenispajak;

class JenispajakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datajenispajak = DB::table('tb_jenis_pajak')->get();
        return view('Jenispajak.tampiljenispajak', compact('datajenispajak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datajenispajak = new Jenispajak;
        $datajenispajak->jenis_pajak = $request->get('jenis_pajak');
        $datajenispajak->id_akun_pajak = $request->get('id_akun_pajak');

        $datajenispajak->save();
        return redirect('tampiljenispajak')->with('status','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $datajenispajak = Jenispajak::where('id',$request->get('id'))
                    ->update([
                        'jenis_pajak' => $request->get('jenis_pajak'),
                        'id_akun_pajak' => $request->get('id_akun_pajak'),
                    ]);
        return redirect('tampiljenispajak')->with('edit','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Jenispajak::where('id',$id);
        $data->delete();
        // dd($data);
        return redirect('tampiljenispajak');
    }
}
