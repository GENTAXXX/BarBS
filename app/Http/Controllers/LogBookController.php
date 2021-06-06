<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logbookDetail($id){
        $data = Mahasiswa::join('logbook', 'mahasiswa.id', '=', 'logbook.mhs_id')
        ->where('mahasiswa.id', $id)
        ->find($id);
        return view('spv.logbook.edit', compact('data'));
    }

    public function mhsLogbook(){
        $data = Mahasiswa::join('logbook', 'mahasiswa.id', '=', 'logbook.mhs_id')
        ->join('supervisor', 'logbook.spv_id', '=', 'supervisor.id')
        ->where('supervisor.user_id', Auth::id())
        ->get();
        return view('spv.logbook.index', compact('data'));
    }

    public function index()
    {
        $log = Logbook::join('magang', 'logbook.magang_id', '=', 'magang.id')
        ->join('mahasiswa', 'magang.mhs_id', '=', 'mahasiswa.id')
        ->join('lowongan', 'magang.lowongan_id', '=', 'lowongan.id')
        ->where('mahasiswa.user_id', Auth::id())
        ->get();
        dd($log);
        return view('mhs.logbook.index', compact('log'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mhs.logbook.create');
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
            'tanggal' => 'required',
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'saran' =>'required',
        ]);

        Logbook::create($request->all());
        return redirect()->route('logbook.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = Logbook::find($id);
        return view('mhs.logbook.show', compact('log'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $log = Logbook::find($id);
        return view('mhs.logbook.edit', compact('log'));
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
            'tanggal' => 'required',
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'saran' =>'required',
        ]);

        $log = Logbook::find($id);
        $log->update($request->all());
        return redirect()->route('logbook.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $log = Logbook::find($id);
        $log->delete();

        return redirect()->route('bimbingan.index');
    }
}
