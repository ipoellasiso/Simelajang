<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pajakkpp;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function show(){
        $showpajakkpp = DB::table('pajakkpp')
        ->select('potongan2.ebilling', 'sp2d.tanggal_sp2d', 'pajakkpp.nilai_pajak', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'tb_akun_pajak.akun_pajak', 'pajakkpp.ntpn', 'pajakkpp.jenis_pajak', 'potongan2.nilai_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp', 'pajakkpp.id', 'potongan2.status1', 'pajakkpp.created_at')
        ->join('tb_akun_pajak', 'tb_akun_pajak.id', '=', 'pajakkpp.akun_pajak')
        // ->join('tb_jenis_pajak', 'tb_jenis_pajak.id', '=', 'pajakkpp.jenis_pajak')
        ->join('potongan2',  'potongan2.ebilling', 'pajakkpp.ebilling')
        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
        // ->whereBetween('pajakkpp.created_at', ['2024-01-01', '2024-03-31'])
        ->get();

        return view('Pajak.pajakls', compact('showpajakkpp'));
    }
}
