<?php

namespace App\Http\Controllers;

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
        ->join('potongan2',  'potongan2.ebilling', 'pajakkpp.ebilling')
        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
        ->select('potongan2.ebilling', 'sp2d.tanggal_sp2d', 'no_rek_pihak_ketiga', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'pajakkpp.akun_pajak', 'potongan2.jenis_pajak', 'pajakkpp.ntpn', 'potongan2.nilai_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp')->get();
        

        return view('Pajak.ls', compact('pajakkpp'));
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
