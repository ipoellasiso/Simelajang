<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('HalamanDashboard.index');
    }

    public function menuLS()
    {
        return view('Menu.ls');
    }

    public function menuGU()
    {
        return view('Menu.gu');
    }

}
