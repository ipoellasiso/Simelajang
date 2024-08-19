<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
// use Nette\Utils\Random;
use Illuminate\Support\Str;




class logincontroller extends Controller
{
    public function postlogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)){
            if(Auth::user()->email_verified_at != null){
                if(Auth::user()->role === 'admin'){
                    return redirect()->route('beranda')->with('success'.'Halo admin, Anda Berhasil Login');
                } else if(Auth::user()->role === 'user'){
                    return redirect()->route('beranda')->with('Success', 'Berhasil Login');
                } else if(Auth::user()->role === 'verifikasi'){
                    return redirect()->route('beranda')->with('Success', 'Berhasil Login');
                }
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors('Akun Anda Belum Aktif Hub Admin untuk Verifikasi Akun Anda');
            }
            
        }else{
            return redirect()->route('login')->withErrors('Email atau Password Salah');
        }
    }

    public function create()
    {
        return view('Pengguna/register');
    }

    function register(Request $request)
    {
        $str = Str::random(100);

        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'id_opd' => 'required',
            'gambar' => 'required|image|file',
        ],[
            'fullname.required' => 'Full Name Wajib Diisi',
            'fullname.min' => 'Full Name Minimal 5 Karater',
            'email.required' => 'Email Wajib Diisi',
            'email.unique' => 'Email Telah Terdaftar',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password Minimal 6 Karakter',
            'id_opd.required' => 'opd Wajib Diisi',
            'gambar.required' => 'Gambar Wajib Diupload',
            'gambar.image' => 'Gambar yang di upload harus image',
            'gambar.file' => 'Gambar Harus berupa File',
        ]);

        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $nama_gambar = date('ymdhis') . "." . $gambar_ekstensi;
        $gambar_file->move(public_path('picture/accounts'), $nama_gambar);

        $inforegister = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password,
            'id_opd' => $request->id_opd,
            'gambar' => $nama_gambar,
            'verify_key' => $str
        ];

        user::Create($inforegister);
        
        $details = [
            'nama' =>$inforegister['fullname'],
            'role' =>'user',
            'datetime' => date('Y-m-d H:i:s'),
            'website' =>'SIMELAJANG',
            'url' =>'http://'. request()->getHttpHost() . "/" . "verify/". $inforegister['verify_key'],
        ];

        Mail::to($inforegister['email'])->send(new AuthMail($details));
        
        return redirect()->route('controlpengguna')->with('status','Silahkan Cek email untuk verifikasi Akun Anda');

    }

    function verify($verify_key){
        $keyCheck = User::select('verify_key')
        ->where('verify_key',$verify_key)
        ->exists();

        if($keyCheck){
            $user = User::where('verify_key',$verify_key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);

            return redirect()->route('login')->with('Success', 'Verifikasi Berhasil. Akun anda sudah aktif');
        } else {
            return redirect()->route('login')->withErrors('Keys tidak Valid. Pastikan telah melakukan registrasi')->withInput();
            
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }

    public function Destroy($id)
    {
        
        $data = user::findorfail($id);
        $data->delete();
        // dd($data);
        return redirect('controlpengguna')->with('statushapus', 'Data Berhasil di Hapus');
    }

    public function tampildatapengguna($id)
    {
        $data = user::find($id);
    }
}
