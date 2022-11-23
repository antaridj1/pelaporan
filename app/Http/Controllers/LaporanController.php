<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->status)
        {
            $laporans = Laporan::where('status',$request->status)->get();
            return view('laporan.menu',compact('laporans'));
        }
        else
        {
            $laporans = Laporan::all();
            return view('laporan.index',compact('laporans'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menu(Request $request)
    {
        dd($request->status);
        if($request->status){
            $laporans = Laporan::where('status',$request->status)->get();
        }else{
            $laporans = Laporan::all();
        }
        return view('laporan.menu',compact('laporans'));
    }
    
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'judul' => 'required',
            'detail' => 'required',
        ]);

        Laporan::create([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'detail' => $request->detail,
            'user_id' => Auth::id()
        ]);

        return redirect('laporan')
            ->with('status','success')
            ->with('message','Laporan berhasil terkirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::find($id);
        return view('laporan.show',compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        return view('laporan.edit',compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'kategori' => 'required',
            'judul' => 'required',
            'detail' => 'required',
        ]);

        $laporan->update([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'detail' => $request->detail,
        ]);

        return redirect('laporan')
            ->with('status','success')
            ->with('message','Laporan berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect('laporan')
            ->with('status','success')
            ->with('message','Laporan berhasil terhapus');
    }

    public function verifikasi(Request $request, Laporan $laporan){
        if ($request->status === 'diterima') {
            $laporan->update([
                'status' => 'diterima',
                'penanggungjawab' => Auth::id()
            ]);
        }else{
            $laporan->update([
                'status' => 'ditolak',
                'penanggungjawab' => Auth::id(),
                'alasan_ditolak' => $request->alasan_ditolak
            ]);
        }
        return redirect('home')
            ->with('status','success')
            ->with('message','Laporan berhasil diverifikasi');
       
    }
}
