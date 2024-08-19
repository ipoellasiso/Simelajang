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
        ->join('opd', 'opd.id', 'pajak.id_opd')
        ->join('tb_jenis_pajak', 'tb_jenis_pajak.id', 'pajak.id_jap')
        ->join('tb_akun_pajak', 'tb_akun_pajak.id', 'pajak.id_kap')
        ->where('id_opd', auth()->user()->id_opd)
        ->get();
        return view('pls', compact('pls'));
    }

}
