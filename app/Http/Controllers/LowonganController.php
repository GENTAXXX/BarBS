<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\Kategori;
use App\Models\Mitra;
use Illuminate\Support\Facades\Auth;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllLowongan(Request $request){
        $cari = $request->cari;
        $low = Lowongan::where('nama','like','%'.$cari.'%')
        ->paginate();
        return view('welcome', compact('low'));
    }
    public function index()
    {
        $idUserLogin = Auth::id();
        $mitra = Mitra::where("user_id", $idUserLogin)->first();
        $low = Lowongan::where("mitra_id", $mitra->id)->get();
        return view('mitra.lowongan.index', compact('low'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $mitra = Mitra::all();
        return view('mitra.lowongan.create', compact('mitra', 'kategori'));
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'telepon' => 'required',
            'jumlah_mhs' => 'required',
            'durasi' => 'required',
            'mitra_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);

        Lowongan::create($request->all());
       
        return redirect()->route('lowongan.index')->with('success','Lowongan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lowongan $lowongan)
    {
        return view('mitra.lowongan.detail', compact('lowongan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lowongan $lowongan)
    {
        $low = Lowongan::find($lowongan->id);
        $kategori = Kategori::all();
        $mitra = Mitra::all();
        return view('mitra.lowongan.edit', compact('low', 'kategori', 'mitra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'telepon' => 'required',
            'jumlah_mhs' => 'required',
            'durasi' => 'required',
            'mitra_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);

        $lowongan->update($request->all());

        return redirect()->route('lowongan.index')->with('success', 'Lowongan created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lowongan $lowongan)
    {
        $lowongan = Lowongan::find($lowongan->id);
        $lowongan->delete();

        return redirect()->route('lowongan.index')->with('success', 'Lowongan created successfully.');
    }
}
