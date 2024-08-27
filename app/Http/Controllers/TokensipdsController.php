<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tokensipd;

class TokensipdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $token = DB::table('token')->select('token.token_sipd', 'token.id')
        // ->where('token',)
        ->get();
        return view('token_sipd', compact('token'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        tokensipd::where('id',$request->get('id'))
                        ->update([
                            'token_sipd' => $request->get('token_sipd'),
                        ]);

        return redirect('beranda')->with('edit','Token Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
