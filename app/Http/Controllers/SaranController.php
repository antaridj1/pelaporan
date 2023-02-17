<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaranController extends Controller
{
    public function index()
    {
        $sarans = Saran::all();
        return view('saran.index', compact('sarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saran.create');
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
            'detail' => 'required',
        ]);

        Saran::create([
            'detail' => $request->detail,
            'user_id' => Auth::id()
        ]);

        return redirect('saran')
            ->with('status','success')
            ->with('message','Saran berhasil ditambah');
    }

    public function edit(Saran $saran)
    {
        return view('saran.edit',compact('saran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saran $saran)
    {
        $request->validate([
            'detail' => 'required',
        ]);

        $saran->update([
            'detail' => $request->detail,
        ]);

        return redirect('saran')
            ->with('status','success')
            ->with('message','Saran berhasil diedit');
    }

    public function destroy(Saran $saran)
    {
        $saran->delete();

        return redirect('saran')
            ->with('status','success')
            ->with('message','Saran berhasil terhapus');
    }
}
