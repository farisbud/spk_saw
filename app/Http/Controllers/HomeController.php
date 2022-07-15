<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\Alternatif;
use App\Nilai_saw;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        


        return view('home',[
            'kriteria'=> kriteria::all(),
            'alternatif' => Alternatif::all(),
            'nilai' => Nilai_saw::all(),
        ]);
    }
}
