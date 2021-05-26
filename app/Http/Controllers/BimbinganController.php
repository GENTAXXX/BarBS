<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimbingan;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listMahasiswa(){
        $bimbingan = Bimbingan::join('dosen', 'bimbingan.dosen_id', '=', 'dosen.id')
        ->where('dosen.user_id', Auth::id())
        ->get();
        return view('dosen.bimbingan.index', compact('bimbingan'));
    }

    public function index()
    {
        $bimbingan = Bimbingan::join('mahasiswa', 'bimbingan.mhs_id', '=', 'mahasiswa.id')
        ->join('dosen', 'bimbingan.dosen_id', '=', 'dosen.id')
        ->where('mahasiswa.user_id', Auth::id())
        ->get();
        return view('mhs.bimbingan.index', compact('bimbingan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mhs.bimbingan.create');
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
            'catatan' => 'required',
            'tgl_bimbingan' => 'required',
            'mhs_id' => 'required',
            'dosen_id' =>'required'
        ]);

        Bimbingan::create($request->all());
        return redirect()->route('bimbingan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bimbingan = Bimbingan::find($id);
        return view('mhs.bimbingan.show', compact('bimbingan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bimbingan = Bimbingan::find($id);
        return view('mhs.bimbingan.edit', compact('bimbingan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required',
            'tgl_bimbingan' => 'required',
            'mhs_id' => 'required',
            'dosen_id' =>'required'
        ]);

        $bimbingan = Bimbingan::find($id);
        $bimbingan->update($request->all());
        return redirect()->route('bimbingan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bimbingan = Bimbingan::find($id);
        $bimbingan->delete();

        return redirect()->route('bimbingan.index');
    }
}
