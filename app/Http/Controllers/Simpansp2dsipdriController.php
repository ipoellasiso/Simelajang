<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBelanja1;
use App\Models\ModelPotonngan2;
use App\Models\ModelSp2d;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Simpansp2dsipdriController extends Controller
{

    public function index()
    {
        $page = $_GET['id'];
            // $nomordok = $_GET['id'];
            $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJTSVBEX0FVVEhfU0VSVklDRSIsInN1YiI6IjMyMi4zNDIiLCJleHAiOjE3MjQyNDA5NjgsImlhdCI6MTcyNDAyNDk2OCwidGFodW4iOjIwMjQsImlkX3VzZXIiOjMyMiwiaWRfZGFlcmFoIjozNDIsImtvZGVfcHJvdmluc2kiOiI3MiIsImlkX3NrcGQiOjAsImlkX3JvbGUiOjksImlkX3BlZ2F3YWkiOjMyMiwic3ViX2RvbWFpbl9kYWVyYWgiOiJwYWx1In0.Fok87TmB32NAyt9j2UGBwg9GvEQYIirI0DlvPdmnLO8';
            $urlls = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/index?jenis=LS&status=LS&page=$page&limit=10";
            // $urlgu = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/index?jenis=GU&status=LS&page=$page&limit=10";
            // $urldok = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/cetak/$nomordok";
            $pagination = 40 ;

            $hitung = $pagination;
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $urlls,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer  $token"
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $dt = json_decode($response, true);

        return view('Sipdri.tampilsp2dsipdri', compact('dt'));
    }

    public function store(Request $request)
    {
            $page = $_GET['id'];
            $nomordok = $_GET['id'];
            $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJTSVBEX0FVVEhfU0VSVklDRSIsInN1YiI6IjMyMi4zNDIiLCJleHAiOjE3MjQyNDA5NjgsImlhdCI6MTcyNDAyNDk2OCwidGFodW4iOjIwMjQsImlkX3VzZXIiOjMyMiwiaWRfZGFlcmFoIjozNDIsImtvZGVfcHJvdmluc2kiOiI3MiIsImlkX3NrcGQiOjAsImlkX3JvbGUiOjksImlkX3BlZ2F3YWkiOjMyMiwic3ViX2RvbWFpbl9kYWVyYWgiOiJwYWx1In0.Fok87TmB32NAyt9j2UGBwg9GvEQYIirI0DlvPdmnLO8';
            $urlls = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/index?jenis=LS&status=LS&page=$page&limit=10";
            $urlgu = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/index?jenis=GU&status=LS&page=$page&limit=10";
            $urldok = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/cetak/$nomordok";
            $pagination = 40 ;
            // batasan tambahan

            $curl = curl_init();
            $url = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/cetak/$nomordok";

            curl_setopt_array($curl, array(
            CURLOPT_URL => $urldok,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $token"
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $dt = json_decode($response, true);
            $detail_belanja = $dt["ls"]["detail_belanja"];
            $pajak_potongan = $dt["ls"]["pajak_potongan"];

            
                DB::beginTransaction();
                    $cek = ModelSp2d::where('idhalaman', $request->nomordoc)->count();
                    if($cek > 0)
                    {
                        return redirect()->back()->with('error', 'Data Sudah Ada');
                    }else
                    {
                        $datasp2d = new ModelSp2d;
                        $datasp2d->idhalaman = $nomordok;
                        $datasp2d->jenis = $dt["jenis"];
                        $datasp2d->tahun = $dt["ls"]["header"]["tahun"];
                        $datasp2d->nomor_rekening = $dt["ls"]["header"]["nomor_rekening"];
                        $datasp2d->nama_bank = $dt["ls"]["header"]["nama_bank"];
                        $datasp2d->nomor_sp2d = $dt["ls"]["header"]["nomor_sp_2_d"];
                        $datasp2d->tanggal_sp2d = Carbon::Parse($dt["ls"]["header"]["tanggal_sp_2_d"])->format('Y-m-d');
                        $datasp2d->nama_skpd = $dt["ls"]["header"]["nama_skpd"];
                        $datasp2d->nama_sub_skpd = $dt["ls"]["header"]["nama_sub_skpd"];
                        $datasp2d->nama_pihak_ketiga = $dt["ls"]["header"]["nama_pihak_ketiga"];
                        $datasp2d->no_rek_pihak_ketiga = $dt["ls"]["header"]["no_rek_pihak_ketiga"];
                        $datasp2d->nama_rek_pihak_ketiga = $dt["ls"]["header"]["nama_rek_pihak_ketiga"];
                        $datasp2d->bank_pihak_ketiga = $dt["ls"]["header"]["bank_pihak_ketiga"];
                        $datasp2d->npwp_pihak_ketiga = $dt["ls"]["header"]["npwp_pihak_ketiga"];
                        $datasp2d->keterangan_sp2d = $dt["ls"]["header"]["keterangan_sp2d"];
                        $datasp2d->nilai_sp2d = $dt["ls"]["header"]["nilai_sp2d"];
                        $datasp2d->nomor_spm =  $dt["ls"]["header"]["nomor_spm"];
                        $datasp2d->tanggal_spm = Carbon::Parse( $dt["ls"]["header"]["tanggal_spm"])->format('Y-m-d');
                        $datasp2d->nama_ibu_kota = $dt["ls"]["header"]["nama_ibu_kota"];
                        $datasp2d->nama_bud_kbud = $dt["ls"]["header"]["nama_bud_kbud"];
                        $datasp2d->jabatan_bud_kbud = $dt["ls"]["header"]["jabatan_bud_kbud"];
                        $datasp2d->nip_bud_kbud = $dt["ls"]["header"]["nip_bud_kbud"];
                        $datasp2d->save();

                        foreach($detail_belanja as $row){
                            $databelanja1 = [
                                'norekening' => $row["kode_rekening"],
                                'uraian' => $row["uraian"],
                                'nilai' => $row["jumlah"],
                                'id_sp2d' => $nomordok
                            ];
                            DB::table('belanja1')->insert($databelanja1);
                        }

                        foreach($pajak_potongan as $row1){
                            $datapotongan2 = [
                            // $belanja1 = new ModelBelanja1;
                            // $belanja1->norekening = $row["kode_rekening"];
                            // $belanja1->uraian = $row["uraian"];
                            // $belanja1->nilai = $row["jumlah"];
                            // $belanja1->id_sp2d = $nomordok;

                            'jenis_pajak' => $row1["nama_pajak_potongan"],
                            'ebilling' => $row1["id_billing"],
                            'nilai_pajak' => $row1["nilai_sp2d_pajak_potongan"],
                            'id_potongan' => $nomordok,
                            'status1' => '0'
                            ];
                            DB::table('potongan2')->insert($datapotongan2);
                        }
                    }
                DB::commit();
                return redirect('tampilsp2dsipdri?id=1')->with('status','Data Berhasil disimpan');    
        
    }
}
