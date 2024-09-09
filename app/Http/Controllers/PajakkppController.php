<?php

namespace App\Http\Controllers;

use App\Models\Akunpajak;
use Illuminate\Http\Request;
use App\Models\Pajakkpp;
use App\Models\Pajakpot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PajakkppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pajakkpp = DB::table('pajakkpp')
        ->select('potongan2.ebilling', 'sp2d.tanggal_sp2d', 'pajakkpp.nilai_pajak', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'pajakkpp.akun_pajak', 'pajakkpp.ntpn', 'pajakkpp.jenis_pajak', 'potongan2.nilai_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp', 'pajakkpp.id_potonganls', 'pajakkpp.id', 'potongan2.status1', 'pajakkpp.created_at', 'pajakkpp.bukti_pemby')
        // ->join('tb_akun_pajak', 'tb_akun_pajak.id', '=', 'pajakkpp.akun_pajak')
        // ->join('tb_jenis_pajak', 'tb_jenis_pajak.id', '=', 'pajakkpp.jenis_pajak')
        ->join('potongan2',  'potongan2.id', 'pajakkpp.id_potonganls')
        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
        ->whereBetween('sp2d.tanggal_sp2d', ['2024-01-01', '2024-03-31'])
        ->get();

        $pajakkpp2 = DB::table('pajakkpp')
        ->select('potongan2.ebilling', 'sp2d.tanggal_sp2d', 'pajakkpp.nilai_pajak', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'pajakkpp.akun_pajak', 'pajakkpp.ntpn', 'pajakkpp.jenis_pajak', 'potongan2.nilai_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp', 'pajakkpp.id_potonganls', 'pajakkpp.id', 'potongan2.status1', 'pajakkpp.created_at', 'pajakkpp.bukti_pemby')
        // ->join('tb_akun_pajak', 'tb_akun_pajak.id', '=', 'pajakkpp.akun_pajak')
        // ->join('tb_jenis_pajak', 'tb_jenis_pajak.id', '=', 'pajakkpp.jenis_pajak')
        ->join('potongan2',  'potongan2.id', 'pajakkpp.id_potonganls')
        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
        ->whereBetween('sp2d.tanggal_sp2d', ['2024-04-01', '2024-06-30'])
        ->get();

        $pajakkpp3 = DB::table('pajakkpp')
        ->select('pajakkpp.ebilling', 'sp2d.tanggal_sp2d', 'pajakkpp.nilai_pajak', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'pajakkpp.akun_pajak', 'pajakkpp.ntpn', 'pajakkpp.jenis_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp', 'pajakkpp.id', 'pajakkpp.id_potonganls', 'potongan2.status1', 'pajakkpp.created_at', 'pajakkpp.bukti_pemby')
        // ->join('tb_akun_pajak', 'tb_akun_pajak.id', '=', 'pajakkpp.akun_pajak')
        // ->join('tb_jenis_pajak', 'tb_jenis_pajak.id', '=', 'pajakkpp.jenis_pajak')
        ->join('potongan2',  'potongan2.id', 'pajakkpp.id_potonganls')
        
        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
        // ->join('Pajakkpp', 'potongan2.id_potongan', 'pajakkpp.id_potonganls')
        ->whereBetween('sp2d.tanggal_sp2d', ['2024-07-01', '2024-09-30'])
        
        ->get();

        $pajakkpp4 = DB::table('pajakkpp')
        ->select('potongan2.ebilling', 'sp2d.tanggal_sp2d', 'pajakkpp.nilai_pajak', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'pajakkpp.akun_pajak', 'pajakkpp.jenis_pajak', 'pajakkpp.ntpn', 'potongan2.nilai_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp', 'pajakkpp.id_potonganls', 'pajakkpp.id', 'potongan2.status1', 'pajakkpp.created_at', 'pajakkpp.bukti_pemby')
        // ->join('tb_akun_pajak', 'tb_akun_pajak.id', '=', 'pajakkpp.akun_pajak')
        // ->join('tb_jenis_pajak', 'tb_jenis_pajak.id', '=', 'pajakkpp.jenis_pajak')
        ->join('potongan2',  'potongan2.id', 'pajakkpp.id_potonganls')
        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
        ->whereBetween('sp2d.tanggal_sp2d', ['2024-10-01', '2024-12-31'])
        ->get();

        $pajakls = DB::table('potongan2')
        ->select('potongan2.ebilling', 'potongan2.id', 'potongan2.status1', 'sp2d.tanggal_sp2d', 'sp2d.nomor_sp2d', 'sp2d.nilai_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'sp2d.npwp_pihak_ketiga', 'sp2d.no_rek_pihak_ketiga', 'potongan2.jenis_pajak', 'potongan2.nilai_pajak')
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

        $posttolakpajakls = Pajakpot::where('id', '=', '0')->get();

        return view('Pajak.tampilpajakls', compact('pajakkpp', 'pajakkpp2', 'pajakkpp3', 'pajakkpp4', 'akunpajak1', 'jenispajak1', 'pajakls', 'posttolakpajakls'));
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
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $dt = Pajakkpp::where('id', $id)->first();

        function rupiahedit($angka){
                              
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            return $hasil_rupiah;
          }

        $akunpajak1 = DB::table('tb_akun_pajak')
        ->select('tb_akun_pajak.akun_pajak', 'tb_akun_pajak.id')
        ->get();

        $jenispajak1 = DB::table('tb_jenis_pajak')
        ->select('tb_jenis_pajak.jenis_pajak', 'tb_jenis_pajak.id')
        ->get();

        return view('Pajak.editshowpajakls3', compact('dt', 'akunpajak1', 'jenispajak1'));
        // return 'abc';
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

        // $updatepajakls = Pajakpot::where('ebilling',$request->get('ebilling'))->first();
        //                 dd($updatepajakls);
        
        // Pajakkpp::where('id',$request->get('id'))
        //                 ->update([
        //                     'status2' => '0',
        //                     'ntpn' => '',
        //                 ]);

            return redirect('tampilpajakls')->with('edit','Data Berhasil Ditolak');
    }

    public function updateterima(Request $request, string $id)
    {
        Pajakpot::where('ebilling',$request->get('ebilling'))
                        ->update([
                            'status1' => '1',
                        ]);
        
        // Pajakkpp::where('id',$request->get('id'))
        //                 ->update([
        //                     'status2' => '0',
        //                     'ntpn' => '',
        //                 ]);

            return redirect('tampilpajakls')->with('edit','Data Berhasil Diterima');
    }

    public function updatepajakkpp3(Request $request, string $id)
    {
        // dd($id);
        // $request->validate([
        //     'bukti_pemby' => 'required|mimes:jpeg,png,jpg,pdf|max:5120',
        // ],[
        //     'bukti_pemby.required' => 'Gambar Wajib Diupload',
        //     'bukti_pemby.file' => 'Gambar Harus berupa File',
        // ]);

        Pajakpot::where('id',$request->get('id_potonganls'))
                        ->update([
                            // 'status1' => '1',
                            'jenis_pajak' => $request->get('jenis_pajak'),
                            'nilai_pajak' => str_replace('.','', $request->get('nilai_pajak')),
                            'ebilling' => $request->get('ebilling'),
                        ]);

        $updatepajakls = Pajakkpp::where('id', $id)->first();
            
            
            $updatepajakls->id_potonganls = $request->get('id_potonganls');
            $updatepajakls->akun_pajak = $request->get('akun_pajak');
            $updatepajakls->ebilling = $request->get('ebilling');
            $updatepajakls->ntpn = $request->get('ntpn');
            $updatepajakls->nama_npwp = $request->get('nama_npwp');
            $updatepajakls->nomor_npwp = $request->get('nomor_npwp');
            $updatepajakls->jenis_pajak = $request->get('jenis_pajak');
            $updatepajakls->rek_belanja = $request->get('rek_belanja');
            $updatepajakls->nilai_pajak = str_replace('.','', $request->get('nilai_pajak'));

            if ($request->file('bukti_pemby')) {
                if ($updatepajakls->bukti_pemby){
                    File::delete('dokumen/'.$updatepajakls->bukti_pemby);
                }
                $file = $request->file('bukti_pemby');
                $nama_file = " Simelajang " . " - " .$file->getClientOriginalName();
                $file->move('dokumen', $nama_file);
                $updatepajakls->bukti_pemby = $nama_file;
            }
            
            $updatepajakls->save();
        
        return redirect('tampilpajakls')->with('edit','Data Berhasil Diubah');
        
    }
    
    public function destroy(string $id )
    {
        
        $data = Pajakkpp::where('id',$id);
        $data->delete();

        return redirect('tampilpajakls');
        // dd($id);
    }
}
