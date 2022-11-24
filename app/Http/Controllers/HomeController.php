<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

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
        $jumlah_terkirim = Laporan::where('status','terkirim')->count();
        $jumlah_diproses = Laporan::where('status','diproses')->count();
        $jumlah_selesai = Laporan::where('status','selesai')->count();
        $jumlah_diterima = Laporan::where('status','diterima')->count();
        $laporans = Laporan::latest()->take(5)->get();

        return view('home',compact(['jumlah_terkirim','jumlah_diproses','jumlah_selesai','laporans','jumlah_diterima']));
    }
}
