<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $jumlah_terkirim = Laporan::where('status', IS_TERKIRIM)->count();
        $jumlah_diproses = Laporan::where('status', IS_DIPROSES)->count();
        $jumlah_selesai = Laporan::where('status', IS_TUNTAS)->count();
        $jumlah_diterima = Laporan::where('status', IS_DITERIMA)->count();

        if(Auth::user()->role === 'admin'){
            $laporan = Laporan::where('user_id',Auth::id())->latest()->take(1)->first();
            $laporans = Laporan::where('user_id',Auth::id())->latest()->get();
        }elseif(Auth::user()->role === 'super_admin'){
            $laporan = Laporan::where('user_master_id',Auth::id())->latest()->take(1)->first();
            $laporans = Laporan::where('user_master_id',Auth::id())->orWhere('status', IS_DITERIMA)->latest()->get();
        }else{
            $laporan = Laporan::where('user_master_id',Auth::id())->latest()->take(1)->first();
            $laporans = Laporan::latest()->get();
        }
        

        return view('home',compact(['jumlah_terkirim','jumlah_diproses','jumlah_selesai','laporans','jumlah_diterima','laporan']));
    }
}
