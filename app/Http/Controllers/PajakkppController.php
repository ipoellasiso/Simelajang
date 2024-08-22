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
        ->select('potongan2.ebilling', 'sp2d.tanggal_sp2d', 'no_rek_pihak_ketiga', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'tb_akun_pajak.akun_pajak', 'potongan2.jenis_pajak', 'pajakkpp.ntpn', 'potongan2.nilai_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp')
        ->join('tb_akun_pajak', 'tb_akun_pajak.id', '=', 'pajakkpp.akun_pajak')
        ->join('potongan2',  'potongan2.ebilling', 'pajakkpp.ebilling')
        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
        ->get();
        
        $pajakls = DB::table('potongan2')
        ->select('potongan2.ebilling', 'potongan2.id', 'potongan2.status1', 'sp2d.tanggal_sp2d', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'sp2d.npwp_pihak_ketiga', 'sp2d.no_rek_pihak_ketiga', 'potongan2.jenis_pajak', 'potongan2.nilai_pajak',)
        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
        ->whereIn('potongan2.jenis_pajak', ['Pajak Pertambahan Nilai','Pajak Penghasilan Ps 22','Pajak Penghasilan Ps 23','PPh 21','Pajak Penghasilan Ps 4 (2)'])
        ->where('potongan2.status1',['0'])
        ->get();

        $akunpajak1 = DB::table('tb_akun_pajak')
        ->select('tb_akun_pajak.akun_pajak', 'tb_akun_pajak.id')
        ->get();

        $jenispajak1 = DB::table('tb_jenis_pajak')
        ->select('tb_jenis_pajak.jenis_pajak', 'tb_jenis_pajak.id')
        ->get();

        return view('Pajak.ls', compact('pajakkpp', 'pajakls', 'akunpajak1', 'jenispajak1'));
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
        //
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
