<?php


namespace App\Http\Controllers;

use App\Mail\AuthMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use Nette\Utils\Random;
use Illuminate\Support\Str;
use App\Models\ControlPengguna;
use Illuminate\Support\Facades\DB;



class PenggunaController extends Controller
{
    public function index()
    {
        // $data = ControlPengguna::class::all();
        $data = DB::table('users')
        ->select('users.fullname', 'users.email', 'users.id_opd', 'users.role', 'users.gambar', 'users.verify_key', 'users.id', 'opd.nama_opd')
        ->join('opd', 'users.id_opd', 'opd.id',)
        ->get();
        return view('Pengguna.controlpengguna', compact('data'));
    }

    public function indexuser()
    {
        // $data = ControlPengguna::class::all();
        $data = DB::table('users')
        ->select('users.fullname', 'users.email', 'users.id_opd', 'users.role', 'users.gambar', 'users.verify_key', 'users.id', 'opd.nama_opd')
        ->join('opd', 'users.id_opd', 'opd.id',)
        ->where('id_opd', auth()->user()->id_opd)
        ->get();
        return view('Pengguna.controlpenggunauser', compact('data'));
    }

    public function create()
    {
        
    }

    function store(Request $request)
    {
        $str = Str::random(100);
        // $verifikasi = date('ymdhis');

        $request->validate([
            'fullname' => 'required|min:4',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
        ],[
            'fullname.required' => 'Full Name Wajib Diisi',
            'fullname.min' => 'Full Name Minimal 5 Karater',
            'email.required' => 'Email Wajib Diisi',
            'email.unique' => 'Email Telah Terdaftar',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password Minimal 6 Karakter',
            // 'gambar.required' => 'Gambar Wajib Diupload',
            // 'gambar.image' => 'Gambar yang di upload harus image',
            // 'gambar.file' => 'Gambar Harus berupa File',
        ]);

        // $gambar_file = $request->file('gambar');
        // $gambar_ekstensi = $gambar_file->extension();
        // $nama_gambar = date('ymdhis') . "." . $gambar_ekstensi;
        // $gambar_file->move(public_path('picture/accounts'), $nama_gambar);

        $inforegister = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password,
            'id_opd' => $request->id_opd,
            // 'gambar' => $nama_gambar,
            'verify_key' => $str,
            'email_verified_at' => date('ymdhis')
        ];

        ControlPengguna::Create($inforegister);
        
        // $details = [
        //     'nama' =>$inforegister['fullname'],
        //     'role' =>'user',
        //     'datetime' => date('Y-m-d H:i:s'),
        //     'website' =>'SIMELAJANG',
        //     'url' =>'http://'. request()->getHttpHost() . "/" . "verify/". $inforegister['verify_key'],
        // ];

        // Mail::to($inforegister['email'])->send(new AuthMail($details));
        
        return redirect()->route('controlpengguna')->with('success','Data Berhasil Disimpan');

    }


}
