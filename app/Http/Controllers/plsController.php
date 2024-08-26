<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class plsController extends Controller
{
    public function index()
    {
        //
        $pls = DB::table('pajak')
        // ->join('opd', 'opd.id', 'pajak.id_opd')
        ->join('tb_jenis_pajak', 'tb_jenis_pajak.id', 'pajak.id_jap')
        ->join('tb_akun_pajak', 'tb_akun_pajak.id', 'pajak.id_kap')
        // ->where('id_opd', auth()->user()->id_opd)
        ->whereBetween('pajak.tgl_spm', ['2023-10-01', '2023-12-31'])
        ->get();
        return view('pls', compact('pls'));
    }

}
