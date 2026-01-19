<?php

namespace App\Http\Controllers;

use App\Models\PotonganguModel;
use App\Models\Sp2dModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UbahDataRekonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $userId = Auth::id();

        $data = [
            'title' => 'Register SP2D',
            'page_title' => 'Pengaturan',
            'breadcumd1' => 'Register',
            'breadcumd2' => 'SP2D',
            'userx' => UserModel::where('id',$userId)
                        ->first(['fullname','role','gambar']),
            'opd' => DB::table('users')->where('id',$userId)->first(),
        ];

        /* ================= AJAX DATATABLE ================= */
        if ($request->ajax()) {

            $query = Sp2dModel::select(
                'tanggal_sp2d',
                'nomor_sp2d',
                'nama_skpd',
                'nama_pihak_ketiga',
                'keterangan_sp2d',
                'jenis',
                'nilai_sp2d',
                'nomor_spm'
            );

            return DataTables::of($query)
                ->addIndexColumn()

                ->editColumn('nilai_sp2d', function ($row) {
                    return number_format($row->nilai_sp2d);
                })

                ->addColumn('status_potongan', function ($row) {
                    $potongan = PotonganguModel::where('id_billing', $row->nomor_sp2d)->first();
                    if (!$potongan || $potongan->status3 == 0) {
                        return '<span class="badge bg-danger">Belum</span>';
                    }
                    return '<span class="badge bg-success">Input</span>';
                })

                ->addColumn('aksi', function ($row) {
                    $potongan = PotonganguModel::where('id_billing', $row->nomor_sp2d)->first();
                    if (!$potongan || $potongan->status3 == 0) {
                        return '
                            <button class="btn btn-sm btn-warning"
                                onclick="ubahStatus(\''.$row->nomor_sp2d.'\')">
                                Input Pajak
                            </button>';
                    }
                    return '<span class="text-muted">Terkunci</span>';
                })

                ->rawColumns(['aksi','status_potongan'])
                ->make(true);
        }
        /* ================================================= */

        return view('potongan.index', $data);
    }

    /* ================== UBAH STATUS ================== */
    public function ubahStatus(Request $request)
    {
        PotonganguModel::updateOrCreate(
            ['id_billing' => $request->nomor_sp2d],
            [
                'status3' => 1,
                'status4' => 'Input'
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diubah'
        ]);
    }
}
