<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            $pegawais = User::where('role','pegawai')->get();
            $laporans = Laporan::where('status',$request->status)->get();
            return view('laporan.menu',compact('laporans','pegawais'));
        }
        else
        {   
            if(Auth::user()->role === 'unit'){
                $laporans = Laporan::where('user_id',Auth::id())->latest()->get();
            }elseif(Auth::user()->role === 'pegawai'){
                $laporans = Laporan::where('user_master_id',Auth::id())->orWhere('status',IS_DITERIMA)->latest()->get();
            }else{
                $laporans = Laporan::latest()->get();
            }
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
    {   $pegawais = User::where('role','pegawai')->get();
        $laporan = Laporan::find($id);
        return view('laporan.show',compact('laporan','pegawais'));
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
        if ($request->status == IS_DITERIMA) {
            $laporan->update([
                'status' => IS_DITERIMA,
                'user_master_id' => $request->pegawai
            ]);
            $to = User::where('id',$request->pegawai)->value('email');

            $details = [
                'title' => 'Laporan Baru',
                'body' => 'Anda memiliki satu laporan baru dari '.$laporan->user->name
            ];
            Mail::to($to)->send(new \App\Mail\SendEmail($details));

        }elseif($request->status == IS_DITOLAK){
            $request->validate([
                'alasan_ditolak' => 'required',
            ]);
            $laporan->update([
                'status' => IS_DITOLAK,
                'user_master_id' => Auth::id(),
                'alasan_ditolak' => $request->alasan_ditolak
            ]);
        }elseif($request->status == IS_DIPROSES){
            $laporan->update([
                'status' => IS_DIPROSES,
                'user_master_id' => Auth::id(),
            ]);
            User::where('id', Auth::id())->update([
                'status' => false
            ]);
        }elseif($request->status == IS_SELESAI_DIPROSES){
            $laporan->update([
                'status' => IS_SELESAI_DIPROSES,
                'user_master_id' => Auth::id(),
            ]);
        }elseif($request->status == IS_TUNTAS){
            $laporan->update([
                'status' => IS_TUNTAS,
            ]);
            User::where('id', $laporan->user_master_id)->update([
                'status' => true
            ]);
        }
        return back()
            ->with('status','success')
            ->with('message','Status laporan berhasil diupdate');
       
    }
}
