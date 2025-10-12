<?php

namespace App\Http\Controllers;

use App\Models\JenispajakModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanSandinganPajakguController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    // Get data
    public function index(Request $request)
    {
        $userId = Auth::guard('web')->user()->id;

        $user = UserModel::where('id', $userId)->first(['fullname', 'role', 'gambar']);
        $opd = DB::table('users')
            ->where('nama_opd', auth()->user()->nama_opd)
            ->first();

        $data = [
            'title'            => 'Laporan Sandingan Pajak GU',
            'active_sidemdata' => 'active',
            'active_akunpajak' => 'active',
            'page_title'       => 'Laporan Pajak',
            'breadcumd1'       => 'Laporan',
            'breadcumd2'       => 'Sandingan Pajak GU',
            'userx'            => $user,
            'opd'              => $opd,
        ];

        return view('Laoran_Sandingan_Pajak.Tampilsandinganpajakgu', $data);
    }

    public function getData(Request $request)
    {
        $laporan = DB::table('sp2d')
            ->leftJoin('tb_tbp', 'sp2d.nomor_spm', '=', 'tb_tbp.no_spm')
            ->leftJoin('tb_potongangu', 'tb_tbp.id_tbp', '=', 'tb_potongangu.id_tbp')
            ->leftJoin('pajakkppgu', 'tb_potongangu.id', '=', 'pajakkppgu.id_potonganls')
            ->select(
                'sp2d.nomor_spm',
                'sp2d.tanggal_sp2d',
                'sp2d.nomor_sp2d',
                'sp2d.nilai_sp2d',
                'sp2d.keterangan_sp2d',
                'sp2d.nama_skpd as nama_opd',
                'tb_potongangu.nama_pajak_potongan',
                DB::raw('COALESCE(tb_potongangu.nilai_tbp_pajak_potongan, 0) AS nilai_pajak_register'),
                DB::raw('COALESCE(pajakkppgu.nilai_pajak, 0) AS nilai_pajak_inputan'),
                DB::raw('(COALESCE(tb_potongangu.nilai_tbp_pajak_potongan, 0) - COALESCE(pajakkppgu.nilai_pajak, 0)) AS selisih')
            )
            ->whereIn(DB::raw('LOWER(tb_potongangu.nama_pajak_potongan)'), [
                'pajak pertambahan nilai',
                'ppn',
                'pajak penghasilan ps 21',
                'pajak penghasilan ps 22',
                'pajak penghasilan ps 23',
                'pajak penghasilan ps 4(2)',
                'pph 21',
                'pph 22',
                'pph 23',
                'pph 4(2)',
            ])
            ->orderBy('sp2d.tanggal_sp2d', 'asc')
            ->get();

        return response()->json(['data' => $laporan]);
    }
}
