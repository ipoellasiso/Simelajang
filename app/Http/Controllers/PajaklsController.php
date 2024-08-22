<?php

namespace App\Http\Controllers;

use App\Models\ModelSp2d;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pajakkpp;
use App\Models\Pajakpot;
use App\Models\Akunpajak;

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

        $akunpajak1 = DB::table('tb_akun_pajak')
        ->select('tb_akun_pajak.akun_pajak', 'tb_akun_pajak.id')
        ->get();

        $jenispajak1 = DB::table('tb_jenis_pajak')
        ->select('tb_jenis_pajak.jenis_pajak', 'tb_jenis_pajak.id')
        ->get();

        return view('Pajak.sipdri', compact('pajakls', 'akunpajak1', 'jenispajak1'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
        $request->validate([
            'ntpn' => 'required',
        ],[
            'ntpn.required' => 'NTPN Name Wajib Diisi',
        ]);

        $cek = Pajakkpp::where('ntpn', $request->ntpn)->count();
        if($cek > 0)
        {
            return redirect()->back()->with('error', 'NTPN Sudah Ada');
        }else
        {
            Pajakpot::where('id',$request->get('id'))
                        ->update([
                            'status1' => '1',
                            'ebilling' => $request->get('ebilling'),
                            'jenis_pajak' => $request->get('jenis_pajak'),
                        ]);
            
            $dataPajakkpp= new Pajakkpp;
                $dataPajakkpp->akun_pajak = $request->get('akun_pajak');
                $dataPajakkpp->ebilling = $request->get('ebilling');
                $dataPajakkpp->ntpn = $request->get('ntpn');
                $dataPajakkpp->nama_npwp = $request->get('nama_npwp');
                $dataPajakkpp->nomor_npwp = $request->get('nomor_npwp');
                $dataPajakkpp->jenis_pajak = $request->get('jenis_pajak');
                $dataPajakkpp->rek_belanja = $request->get('rek_belanja');
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
