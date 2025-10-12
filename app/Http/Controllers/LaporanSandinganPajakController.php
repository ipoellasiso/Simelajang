<?php

namespace App\Http\Controllers;

use App\Models\JenispajakModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanSandinganPajakController extends Controller
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
            'title'            => 'Laporan Sandingan Pajak',
            'active_sidemdata' => 'active',
            'active_akunpajak' => 'active',
            'page_title'       => 'Laporan Pajak',
            'breadcumd1'       => 'Laporan',
            'breadcumd2'       => 'Sandingan Pajak',
            'userx'            => $user,
            'opd'              => $opd,
        ];

        return view('Laoran_Sandingan_Pajak.Tampilsandinganpajak', $data);
    }

    public function getData(Request $request)
    {
        $laporan = DB::table('sp2d')
            ->leftJoin('potongan2', 'sp2d.idhalaman', '=', 'potongan2.id_potongan')
            ->leftJoin('pajakkpp', 'potongan2.id', '=', 'pajakkpp.id_potonganls')
            ->select(
                'sp2d.nomor_spm',
                'sp2d.tanggal_sp2d',
                'sp2d.nomor_sp2d',
                'sp2d.nilai_sp2d',
                'sp2d.keterangan_sp2d',
                'sp2d.nama_skpd as nama_opd',
                'potongan2.jenis_pajak',
                DB::raw('COALESCE(potongan2.nilai_pajak, 0) AS nilai_pajak_register'),
                DB::raw('COALESCE(pajakkpp.nilai_pajak, 0) AS nilai_pajak_inputan'),
                DB::raw('(COALESCE(potongan2.nilai_pajak, 0) - COALESCE(pajakkpp.nilai_pajak, 0)) AS selisih')
            )
            ->whereIn(DB::raw('LOWER(potongan2.jenis_pajak)'), [
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
