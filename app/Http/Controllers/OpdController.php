<?php

namespace App\Http\Controllers;

use App\Models\opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpdController extends Controller
{
    public function index()
    {
        $dataopd = DB::table('opd')->get();
        return view('opd.tampilopd', compact('dataopd'));
    }

    public function create()
    {
        // return view('opd.tambahopd');
    }

    public function store(Request $request)
    {
        $dataopd = new opd;
        $dataopd->nama_opd = $request->get('nama_opd');
        $dataopd->nama_bendahara = $request->get('nama_bendahara');
        $dataopd->alamat = $request->get('alamat');

        $dataopd->save();
        return redirect('tampilopd')->with('status','Data Berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $dataopd = opd::where('id',$request->get('id'))
                    ->update([
                        'nama_opd' => $request->get('nama_opd'),
                        'nama_bendahara' => $request->get('nama_bendahara'),
                        'alamat' => $request->get('alamat')
                    ]);
        return redirect('tampilopd')->with('edit','Data Berhasil Diubah');
    }

    public function Destroy($id)
    {
        $data = opd::where('id',$id);
        $data->delete();
        // dd($data);
        return redirect('tampilopd');
    }
}
