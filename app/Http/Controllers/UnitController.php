<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = User::where('role','admin')->get();
        return view('unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.create');
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin'
        ]);

        return redirect('unit')
            ->with('status','success')
            ->with('message','Pegawai berhasil ditambah');
    }

    public function edit(User $unit)
    {
        return view('unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $unit)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $unit->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('unit')
            ->with('status','success')
            ->with('message','Pegawai berhasil diedit');
    }

    public function update_status(User $unit){
        if ($unit->status == true) {
            $unit->update([
                'status' => false
            ]);
        } else {
            $unit->update([
                'status' => true
            ]);
        }

        return redirect('unit')
            ->with('status','success')
            ->with('message','Status unit berhasil diedit');
        
    }
}
