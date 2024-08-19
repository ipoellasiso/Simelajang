<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pajakkpp;
use App\Models\Pajakpot;

class PajaklsController extends Controller
{
    public function index()
    {
        $pajakls = DB::table('potongan2')
        ->select('potongan2.ebilling', 'potongan2.id', 'potongan2.status1', 'sp2d.tanggal_sp2d', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'sp2d.npwp_pihak_ketiga', 'sp2d.no_rek_pihak_ketiga', 'potongan2.jenis_pajak', 'potongan2.nilai_pajak',)
        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
        ->whereIn('potongan2.jenis_pajak', ['Pajak Pertambahan Nilai','Pajak Penghasilan Ps 22','Pajak Penghasilan Ps 23','PPh 21','Pajak Penghasilan Ps 4 (2)'])
        ->where('potongan2.status1',['0'])
        ->get();

        return view('Pajak.sipdri', compact('pajakls'));
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
        // $dataPajakkpp= new Pajakkpp;
        //     $dataPajakkpp->akun_pajak = $request->get('akun_pajak');
        //     $dataPajakkpp->ebilling = $request->get('ebilling');
        //     $dataPajakkpp->ntpn = $request->get('ntpn');
        //     $dataPajakkpp->save();

        // return redirect('tampilpajaksipdri')->with('edit','Data Berhasil Disimpan');
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
        $cek = Pajakkpp::where('ntpn', $request->ntpn)->count();
        if($cek > 0)
        {
            return redirect()->back()->with('error', 'NTPN Sudah Ada');
        }else
        {
            Pajakpot::where('id',$request->get('id'))
                        ->update([
                            'status1' => '1',
                        ]);
        
            $dataPajakkpp= new Pajakkpp;
                $dataPajakkpp->akun_pajak = $request->get('akun_pajak');
                $dataPajakkpp->ebilling = $request->get('ebilling');
                $dataPajakkpp->ntpn = $request->get('ntpn');
                $dataPajakkpp->save();

            return redirect('tampilpajakls')->with('edit','Data Berhasil Disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
