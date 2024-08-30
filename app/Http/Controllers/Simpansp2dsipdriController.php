<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBelanja1;
use App\Models\ModelPotonngan2;
use App\Models\ModelSp2d;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\mysql_num_rows;
use App\Models\tokensipd;
use App\Models\ModelLpj;
use App\Models\ModelTbp;

class Simpansp2dsipdriController extends Controller
{

    public function index()
    {
            // Permintaan Token Otomastis
            $datatoken = DB::table('token')->SELECT ('token_sipd')->GET();
            
            foreach ($datatoken as $row2){
                $nilaitoken= $row2->token_sipd;
            }

            // $tokenPark =  explode(".", $nilaitoken);
            // $payload = $tokenPark['1'];
            // $decode = base64_decode($payload);
            // $json = json_decode($decode, true);
            // $exp = $json['exp'];
            // $waktuSekarang = time();
            // if($exp <= $waktuSekarang){
            //     $url = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/index?jenis=LS&status=ditransfer&page=1&limit=10";
            //     $form_params = [
            //         'nip_user' => '197402271999031004',
            //         'password' => 'p4lu8ud24'
            //     ];
            //     $response = request('post', $url,['http_errors'=>false, 'form_params'=>$form_params]);
            //     $response = json_decode($response, true);
            //     $token1 = $response['access_token'];
            //     $dataToken1 = [
            //         'token_sipd' => $token1
            //     ];
            //     $dataToken1 = save();
            // }
            // Batas Permintaan Token
            // return ($exp."--".$waktuSekarang);
            
             $page = $_GET['id'];
            $urlls = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/index?jenis=LS&status=ditransfer&page=$page&limit=10";
            $pagination = 10 ;

            // $datasp2d = DB::table('sp2d')->select('status1')->get();

            $hitung = $pagination;
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $urlls,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            // CURLOPT_POSTFIELDS => $datasp2d,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer  $nilaitoken"
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $dt = json_decode($response, true);

        return view('Sipdri.tampilsp2dsipdri', compact('dt'));
    }

    public function indexgu()
    {
            
            $datatoken = DB::table('users')
            ->select ('token_sipd')
            ->where('id_opd', auth()->user()->id_opd)
            ->get();

            foreach ($datatoken as $row1){
                $nilaitoken = $row1->token_sipd;
            }
            
            $page = $_GET['id'];
            $urlls = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/tbp/index/0?is_panjar=0&jenis=UP&page=$page&limit=50&status=aktif";

            $curl = curl_init();
            curl_setopt_array($curl, array(
                    CURLOPT_URL => $urlls,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    // CURLOPT_POSTFIELDS => $datasp2d,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        "Authorization: Bearer  $nilaitoken"
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $dt1 = json_decode($response, true);

            $datalpj = DB::table('tb_lpj')->select('tb_lpj.id_tbp')->get();

        return view('Sipdri.gu.tampilsp2dsipdrigu', compact('dt1', 'datalpj'));
    }

    public function store(Request $request)
    {
            $page = $_GET['id'];
            $nomordok = $_GET['id'];
            $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJTSVBEX0FVVEhfU0VSVklDRSIsInN1YiI6IjEzNDQ0Ni4zNDIiLCJleHAiOjE3MjQ5MzUwNTEsImlhdCI6MTcyNDcxOTA1MSwidGFodW4iOjIwMjQsImlkX3VzZXIiOjEzNDQ0NiwiaWRfZGFlcmFoIjozNDIsImtvZGVfcHJvdmluc2kiOiI3MiIsImlkX3NrcGQiOjAsImlkX3JvbGUiOjExLCJpZF9wZWdhd2FpIjoxMjYyNDgsInN1Yl9kb21haW5fZGFlcmFoIjoicGFsdSJ9.Me3AhPFItFsr_MHfwEkz2SehWynAjmBrAm81CAWgufY';
            // $urlls = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/index?jenis=LS&status=LS&page=$page&limit=10";
            // $urlgu = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/index?jenis=GU&status=LS&page=$page&limit=10";
            $urldok = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/cetak/$nomordok";
            // $pagination = 40 ;
            // batasan tambahan

            $curl = curl_init();
            // $url = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/cetak/$nomordok";

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

                        if ($pajak_potongan == null){
                            echo "<h3>SP2D ini tidak memiliki Potongan</h3>";
                        }else{
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
                return redirect()->back()->with('status', 'Data Berhasil diSimpan');
                // return redirect('tampilsp2dsipdri?id=1')->with('status','Data Berhasil disimpan');    
        
    }


    public function storelpj(Request $request)
    {

            $datatoken = DB::table('users')
            ->select ('token_sipd')
            ->where('id_opd', auth()->user()->id_opd)
            ->get();

            foreach ($datatoken as $row1){
                $nilaitoken = $row1->token_sipd;
            }

            // $page = $_GET['id2'];
            $nomordok = $_GET['id'];
            $urldok = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/tbp/cetak/$nomordok";

            $curl = curl_init();

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
                "Authorization: Bearer $nilaitoken"
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $dt = json_decode($response, true);
            $detail = $dt["detail"];
            $pajak_potongan = $dt["pajak_potongan"];

            
                DB::beginTransaction();
                    
                        $datalpj = new ModelLpj;
                        $datalpj->id_tbp = $nomordok;
                        $datalpj->nomor_tbp = $dt["nomor_tbp"];
                        $datalpj->nilai_tbp = $dt["nilai_tbp"];
                        $datalpj->nama_skpd = $dt["nama_skpd"];
                        $datalpj->nama_tujuan = $dt["nama_tujuan"];
                        $datalpj->npwp = $dt["npwp"];
                        $datalpj->nomor_npd = $dt["nomor_npd"];
                        $datalpj->tanggal_tbp = Carbon::Parse($dt["tanggal_tbp"])->format('Y-m-d');
                        $datalpj->nama_pa_kpa = $dt["nama_pa_kpa"];
                        $datalpj->nip_pa_kpa = $dt["nip_pa_kpa"];
                        $datalpj->jabatan_pa_kpa = $dt["jabatan_pa_kpa"];
                        $datalpj->nama_bp_bpp = $dt["nama_bp_bpp"];
                        $datalpj->nip_bp_bpp = $dt["nip_bp_bpp"];
                        $datalpj->jabatan_bp_bpp = $dt["jabatan_bp_bpp"];
                        $datalpj->nomor_sp2d = $request->get('nomor_sp2d');
                        $datalpj->save();

                        foreach($detail as $row3){
                            $databelanja2 = [
                                'kode_rekening' => $row3["kode_rekening"],
                                'uraian' => $row3["uraian"],
                                'jumlah' => $row3["jumlah"],
                                'id_tbp' => $nomordok
                            ];
                            DB::table('tb_belanjagu')->insert($databelanja2);
                        }

                        if ($pajak_potongan == null){
                            echo "<h3>SP2D ini tidak memiliki Potongan</h3>";
                        }else{
                            foreach($pajak_potongan as $row2){
                                $datapotongan3 = [
                                // $belanja1 = new ModelBelanja1;
                                // $belanja1->norekening = $row["kode_rekening"];
                                // $belanja1->uraian = $row["uraian"];
                                // $belanja1->nilai = $row["jumlah"];
                                // $belanja1->id_sp2d = $nomordok;

                                'nama_pajak_potongan' => $row2["nama_pajak_potongan"],
                                'id_billing' => $row2["id_billing"],
                                'nilai_tbp_pajak_potongan' => $row2["nilai_tbp_pajak_potongan"],
                                'id_tbp' => $nomordok
                                ];
                                DB::table('tb_potongangu')->insert($datapotongan3);
                            }
                        }
                    
                DB::commit();
                return redirect()->back()->with('status', 'Data Berhasil diSimpan');
                // return redirect()->back()->with('status', 'Data Berhasil diSimpan');
                // return redirect('tampilsp2dsipdri?id=1')->with('status','Data Berhasil disimpan');    
        
    }

    public function storetbp(Request $request)
    {

            $datatoken = DB::table('users')
            ->select ('token_sipd')
            ->where('id_opd', auth()->user()->id_opd)
            ->get();

            foreach ($datatoken as $row1){
                $nilaitoken = $row1->token_sipd;
            }

            $page = $_GET['id'];
            $nomordok = $_GET['id'];
            $urldok = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/tbp/index/0?is_panjar=0&jenis=UP&page=1&limit=10&status=aktif";

            $curl = curl_init();

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
                "Authorization: Bearer $nilaitoken"
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $dt = json_decode($response, true);
            

                DB::beginTransaction();
                    
                        $dataltbp = new ModelTbp();
                        $dataltbp->id_tbp = $nomordok;
                        $dataltbp->id_sp2d = $dt["0"]["id_sp2d"];
                        $dataltbp->nomor_tbp = $dt["0"]["nomor_tbp"];
                        $dataltbp->nilai_tbp = $dt["0"]["nilai_tbp"];
                        $dataltbp->keterangan_tbp = $dt["0"]["keterangan_tbp"];
                        $dataltbp->save();
                        // dd($dataltbp);
                    
                DB::commit();
                return redirect()->back()->with('status', 'Data Berhasil diSimpan');
                // return redirect('tampilsp2dsipdri?id=1')->with('status','Data Berhasil disimpan');    
        
    }


}
