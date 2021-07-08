<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Departemen;
use App\Models\Dosen;
use App\Models\Logbook;
use App\Models\Lowongan;
use App\Models\Magang;
use App\Models\Mahasiswa;
use App\Models\Mitra;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function countPendaftar(){
        $data = Magang::where('spv_id', null)->get();
        return $data->count();
    }

    public function listMagang(){
        $data = Magang::join('mahasiswa', 'magang.mhs_id', '=', 'mahasiswa.id')
        ->join('lowongan', 'magang.lowongan_id', '=', 'lowongan.id')
        ->join('mitra', 'lowongan.mitra_id', '=', 'mitra.id')
        ->where('mitra.user_id', Auth::id())
        ->select('mahasiswa.*', 'lowongan.*', 'mitra.*', 'magang.id as magang_id')
        ->get();
        $count = $this->countPendaftar();
        return view('mitra.magang.index', compact('data', 'count'));
    }

    public function listPendaftar(){
        $data = Magang::join('mahasiswa', 'magang.mhs_id', '=', 'mahasiswa.id')
        ->join('lowongan', 'magang.lowongan_id', '=', 'lowongan.id')
        ->join('mitra', 'lowongan.mitra_id', '=', 'mitra.id')
        ->where('mitra.user_id', Auth::id())
        ->where('spv_id', null)
        ->select('mahasiswa.*', 'lowongan.*', 'mitra.*', 'magang.id as magang_id')
        ->get();
        $count = $this->countPendaftar();
        return view('mitra.pendaftar.index', compact('data', 'count'));
    }

    public function pendaftar($id){
        $data = Magang::join('mahasiswa', 'magang.mhs_id', '=', 'mahasiswa.id')
        ->join('lowongan', 'magang.lowongan_id', '=', 'lowongan.id')
        ->select('mahasiswa.*', 'lowongan.*', 'magang.id as magang_id')
        ->find($id);
        // $idlogin = Mitra::where('user_id', Auth::id())->get();
        $spv = Supervisor::all();
        $count = $this->countPendaftar();
        return view('mitra.pendaftar.edit', compact('data', 'spv', 'count'));
    }

    public function listPengajuan(){
        $magang = Magang::where('dosen_id', null)->get();
        $count = $this->countPendaftar();
        // dd($magang);
        return view('depart.pengajuan.index', compact('magang', 'count'));
    }

    public function pengajuan($id){
        $data = Magang::join('mahasiswa as mhs', 'magang.mhs_id', '=', 'mhs.id')
        ->join('lowongan as low', 'magang.lowongan_id', '=', 'low.id')
        ->select('mhs.*', 'low.*','magang.id as magang_id')
        ->find($id);
        // $idlogin = Departemen::where('user_id', Auth::id())->get();
        $dosen = Dosen::all();
        $count = $this->countPendaftar();
        return view('depart.pengajuan.edit', compact('data', 'dosen', 'count'));
    }

    public function apply($id){
        $idUserLogin = Auth::id();
        $mhs = Mahasiswa::where('user_id', $idUserLogin)->first();
        $low = Lowongan::find($id);
        return view('lowongan.apply', compact('mhs', 'low'));
    }

    public function detail($id){
        $low = Lowongan::find($id);
        return view('lowongan.detail', compact('low'));
    }
    
    public function index()
    {
        $low = Lowongan::all();
        return view('welcome', compact('low'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $magang = new Magang();
        $magang->mhs_id = $request->mhs_id;
        $magang->lowongan_id = $request->lowongan_id;
        $magang->save();

        return redirect()->route('mahasiswa.home');
    }

    public function updateDospem(Request $request, $id){
        $magang = Magang::find($id);
        $magang->update([
            'dosen_id' => $request->dosen_id,
        ]);
        // dd($request);
        
        return redirect()->route('pengajuan.index');
    }
    
    public function approval(Request $request, $id){
        $magang = Magang::find($id);
        $magang->update([
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'spv_id' => $request->spv_id,
            'approval' => $request->approval,
        ]);

        switch ($magang->approval){
            case '1':
                $mhs = Mahasiswa::where('id', $magang->mhs_id);
                $mhs->update([
                    'status_id' => '2'
                ]);
                break;
            case '0':
                $mhs = Mahasiswa::where('id', $magang->mhs_id);
                $mhs->update([
                    'status_id' => '1'
                ]);
                break;
        }
        return redirect()->route('pendaftar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lowongan $lowongan)
    {
        return view('lowongan.detail', compact('lowongan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
