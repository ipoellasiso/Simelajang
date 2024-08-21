<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PotonganbpjsController extends Controller
{
    public function index()
    {
        $potonganbpjs = DB::table('potongan2')
            ->select('potongan2.ebilling', 'potongan2.id', 'potongan2.status1', 'sp2d.tanggal_sp2d', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'sp2d.npwp_pihak_ketiga', 'sp2d.no_rek_pihak_ketiga', 'potongan2.jenis_pajak', 'potongan2.nilai_pajak',)
            ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
            ->whereIn('potongan2.jenis_pajak', ['Iuran Jaminan Kesehatan 4%','Iuran Wajib Pegawai 1%','Askes'])
            // ->where('potongan2.status1',['0'])
            ->get();
        return view('Potongan.bpjs', compact('potonganbpjs'));
    }
}
