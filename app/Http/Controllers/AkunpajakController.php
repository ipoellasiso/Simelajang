<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Akunpajak;

class AkunpajakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataakunpajak = DB::table('tb_akun_pajak')->get();
        return view('Akunpajak.tampilakunpajak', compact('dataakunpajak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Akunpajak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data['akun_pajak'] = $request->get('akun_pajak');
        // Akunpajak::insert($data);
        $dataakunpajak = new Akunpajak;
        $dataakunpajak->akun_pajak = $request->get('akun_pajak');

        $dataakunpajak->save();
        return redirect('tampilakunpajak')->with('status','Data Berhasil disimpan');
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
        $dataopd = Akunpajak::where('id',$request->get('id'))
                    ->update([
                        'akun_pajak' => $request->get('akun_pajak'),
                    ]);
        return redirect('tampilakunpajak')->with('edit','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Akunpajak::where('id',$id);
        $data->delete();
        // dd($data);
        return redirect('tampilakunpajak');
    }
}
