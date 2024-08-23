<?php

namespace App\Http\Controllers;

use App\Models\Akunpajak;
use Illuminate\Http\Request;
use App\Models\Pajakkpp;
use App\Models\Pajakpot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PajakkppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pajakkpp = DB::table('pajakkpp')
        ->select('potongan2.ebilling', 'sp2d.tanggal_sp2d', 'no_rek_pihak_ketiga', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'tb_akun_pajak.akun_pajak', 'potongan2.jenis_pajak', 'pajakkpp.ntpn', 'potongan2.nilai_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp', 'pajakkpp.id')
        ->join('tb_akun_pajak', 'tb_akun_pajak.id', '=', 'pajakkpp.akun_pajak')
        ->join('potongan2',  'potongan2.ebilling', 'pajakkpp.ebilling')
        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
        ->where('pajakkpp.status2',['1'])
        ->get();
        
        $akunpajak1 = DB::table('tb_akun_pajak')
        ->select('tb_akun_pajak.akun_pajak', 'tb_akun_pajak.id')
        ->get();

        $jenispajak1 = DB::table('tb_jenis_pajak')
        ->select('tb_jenis_pajak.jenis_pajak', 'tb_jenis_pajak.id')
        ->get();

        return view('Pajak.ls', compact('pajakkpp', 'akunpajak1', 'jenispajak1'));
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
        Pajakpot::where('ebilling',$request->get('ebilling'))
                        ->update([
                            'status1' => '0',
                        ]);
        
        Pajakkpp::where('id',$request->get('id'))
                        ->update([
                            'status2' => '0',
                        ]);

            return redirect('tampilpajakls')->with('edit','Data Berhasil Ditolak');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id )
    {
        
        $data = Pajakkpp::where('id',$id);
        $data->delete();

        return redirect('tampilpajakls');
    }
}
