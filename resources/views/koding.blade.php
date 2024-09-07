

// $updatepajakls = Pajakkpp::findOrFail($id);
// return($updatepajakls);

// if ($updatepajakls->bukti_pemby){
//     File::delete('dokumen/'.$updatepajakls->bukti_pemby);
// }
// $updatepajakls = DB::table('pajakkpp')
//     ->select ('id')
//     ->where('id',$id)
//     ->get();
// return ($updatepajakls);
    // File::delete('dokumen/'.$updatepajakls->bukti_pemby);


// dd($image_path);
// $updatepajakls->ebilling = $request->get('ebilling');
// $updatepajakls->ntpn = $request->get('ntpn');
// $updatepajakls->jenis_pajak = $request->get('jenis_pajak');
// $updatepajakls->akun_pajak = $request->get('akun_pajak');
// $updatepajakls->rek_belanja = $request->get('rek_belanja');
// $updatepajakls->nama_npwp = $request->get('nama_npwp');
// $updatepajakls->nomor_npwp = $request->get('nomor_npwp');
// $updatepajakls->nilai_pajak = str_replace('.','', $request->get('nilai_pajak'));

// if ($request->file('bukti_pemby')) {
//     // if ($request->bukti_pemb){
//     //     File::delete('dokumen/'.$request->bukti_pemby);
//     // }
//     $file = $request->file('bukti_pemby');
//     $nama_file = " Simelajang " . " - " .$file->getClientOriginalName();
//     $file->move('dokumen', $nama_file);
//     // $updatepajakls->bukti_pemby = $nama_file;
// }
// return($request);
// return($request);

// $updatepajakls->update();

// Pajakkpp::where('id',$request->get('id'))
//                 ->update([
//                     // 'status2' => '0',
//                     'id_potonganls' => $request->get('id_potonganls'),
//                     'ebilling' => $request->get('ebilling'),
//                     'ntpn' => $request->get('ntpn'),
//                     'jenis_pajak' => $request->get('jenis_pajak'),
//                     'akun_pajak' => $request->get('akun_pajak'),
//                     'rek_belanja' => $request->get('rek_belanja'),
//                     'nama_npwp' => $request->get('nama_npwp'),
//                     'nomor_npwp' => $request->get('nomor_npwp'),
//                     'nilai_pajak' => str_replace('.','', $request->get('nilai_pajak')),
//                     'bukti_pemby' => $nama_file,
//                 ]);