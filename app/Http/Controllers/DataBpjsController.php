<?php

namespace App\Http\Controllers;

use App\Models\BpjsModel;
use App\Models\JenispajakModel;
use App\Models\PotonganModel;
use App\Models\Sp2dModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DataBpjsController extends Controller
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
            'title'            => 'Data BPJS',
            'active_sidemdata' => 'active',
            'active_akunpajak' => 'active',
            'page_title'       => 'Data BPJS',
            'breadcumd1'       => 'Data',
            'breadcumd2'       => 'BPJS',
            'userx'            => $user,
            'opd'              => $opd,
        ];

        return view('Data_Bpjs.Tampilbpjs', $data);
    }

    public function getBpjsData(Request $request)
    {
        $data = \App\Models\BpjsModel::orderBy('created_at', 'desc');

        return datatables()->of($data)
            ->addIndexColumn()
            ->editColumn('nilai_potongan', function ($row) {
                return number_format($row->nilai_potongan, 0, ',', '.');
            })
            ->addColumn('status', function ($row) {
                return ucfirst($row->status2);
            })
            ->addColumn('action', function ($row) {
                return '
                    <button class="btn btn-sm btn-info detailBpjs" data-id="'.$row->id.'">
                        <i class="fas fa-eye"></i> Detail
                    </button>
                    <button class="btn btn-sm btn-danger hapusBpjs" data-id="'.$row->id.'">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // ✅ get data dari SP2D untuk modal SIPD RI
    public function getSp2dAjax()
    {
        $data = DB::table('potongan2')
        ->leftJoin('sp2d', 'potongan2.id_potongan', '=', 'sp2d.idhalaman')
        ->select(
            'potongan2.id as id_potongan',
            'potongan2.nilai_pajak as nilai_potongan',
            'sp2d.idhalaman',
            'sp2d.nama_skpd',
            'sp2d.nomor_sp2d',
            'sp2d.tanggal_sp2d',
            'sp2d.nilai_sp2d'

        )
        ->whereNotNull('sp2d.nomor_sp2d')
        ->whereNull('potongan2.id_rincianbpjs') // hanya data induk belum dipakai
        ->orderBy('sp2d.tanggal_sp2d', 'desc')
        ->get();

    return datatables()->of($data)
        ->addIndexColumn()
        ->editColumn('tanggal_sp2d', function ($row) {
            return \Carbon\Carbon::parse($row->tanggal_sp2d)->format('d-m-Y');
        })
        ->editColumn('nilai_potongan', function ($row) {
            return number_format($row->nilai_potongan ?? 0, 0, ',', '.');
        })
        ->addColumn('action', function ($row) {
            return '
                <button class="btn btn-sm btn-success pilihSp2d"
                    data-idpotongan="'.$row->id_potongan.'"
                    data-idhalaman="'.$row->idhalaman.'"
                    data-tgl="'.$row->tanggal_sp2d.'"
                    data-no="'.$row->nomor_sp2d.'"
                    data-nilai="'.$row->nilai_potongan.'">
                    Pilih
                </button>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    // ✅ simpan data potongan ke tb_bpjs
    public function simpan(Request $request)
    {
        $request->validate([
            'ebilling'       => 'required|string|max:50',
            'ntpn'           => 'required|string|max:50',
            'akun_potongan'  => 'required|string|max:50',
            'nama_npwp'      => 'required|string|max:100',
            'nomor_npwp'     => 'required|string|max:30',
            'rek_belanja'    => 'required|string|max:50',
        ], [
            'required' => ':attribute tidak boleh kosong.',
        ]);

        // 🔹 Decode potongan dari JSON
        $potongan = json_decode($request->potongan, true);

        // 🔹 Normalisasi input (hilangkan spasi & lowercase)
        $ebillingNormalized = strtolower(str_replace(' ', '', $request->ebilling));
        $ntpnNormalized     = strtolower(str_replace(' ', '', $request->ntpn));

        // 🔹 Cek E-Billing sudah ada atau belum
        $cekEbilling = DB::table('tb_bpjs')
            ->whereRaw("LOWER(REPLACE(ebilling, ' ', '')) = ?", [$ebillingNormalized])
            ->exists();

        if ($cekEbilling) {
            return response()->json([
                'success' => false,
                'message' => 'E-Billing tersebut sudah pernah digunakan pada data BPJS lain.'
            ]);
        }

        // 🔹 Cek NTPN sudah ada atau belum
        $cekNtpn = DB::table('tb_bpjs')
            ->whereRaw("LOWER(REPLACE(ntpn, ' ', '')) = ?", [$ntpnNormalized])
            ->exists();

        if ($cekNtpn) {
            return response()->json([
                'success' => false,
                'message' => 'NTPN tersebut sudah pernah digunakan pada data BPJS lain.'
            ]);
        }
        
        $potongan = json_decode($request->potongan, true);
        DB::beginTransaction();

        try {
            $kodeRandom = Str::random(10);

            $bpjs = BpjsModel::create([
                'id_bpjs'        => $kodeRandom,
                'ebilling'       => $request->ebilling,
                'ntpn'           => $request->ntpn,
                'akun_potongan'  => $request->akun_potongan,
                'nama_npwp'      => $request->nama_npwp,
                'nomor_npwp'     => $request->nomor_npwp,
                'rek_belanja'    => $request->rek_belanja,
                'status1'        => 'aktif',
                'status2'        => 'belum validasi',
                'nilai_potongan' => array_sum(array_column($potongan, 'nilai_potongan')),
            ]);

            foreach ($potongan as $item) {
                $idPotongan = $item['idPotongan'] ?? null;

                if ($idPotongan) {
                    DB::table('potongan2')
                        ->where('id', $idPotongan)
                        ->update(['id_rincianbpjs' => $kodeRandom]);
                }
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data BPJS berhasil disimpan']);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function detail($id)
    {
        // Ambil data induk dari tb_bpjs
        $bpjs = DB::table('tb_bpjs')->where('id', $id)->first();

        if (!$bpjs) {
            return response()->json(['success' => false, 'message' => 'Data BPJS tidak ditemukan']);
        }

        // Join potongan2 dengan sp2d agar bisa ambil nomor, tanggal, dan nilai sp2d
        $rincian = DB::table('potongan2')
            ->leftJoin('sp2d', 'sp2d.idhalaman', '=', 'potongan2.id_potongan')
            ->where('potongan2.id_rincianbpjs', $bpjs->id_bpjs)
            ->select(
                'potongan2.jenis_pajak',
                'potongan2.nilai_pajak',
                'sp2d.tanggal_sp2d',
                'sp2d.nomor_sp2d',
                'sp2d.nilai_sp2d'
            )
            ->get();

        return response()->json([
            'success' => true,
            'bpjs' => $bpjs,
            'rincian' => $rincian
        ]);
    }

    public function hapus($id)
    {
        try {
            $bpjs = BpjsModel::findOrFail($id);

            // hapus data rincian di potongan2
            DB::table('potongan2')
                ->where('id_rincianbpjs', $bpjs->id_bpjs)
                ->update(['id_rincianbpjs' => null]);

            // hapus data bpjs
            $bpjs->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data BPJS berhasil dihapus.'
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data: ' . $e->getMessage()
            ]);
        }
    }

}
