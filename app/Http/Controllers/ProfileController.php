<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Kabupaten;
use App\Models\Mahasiswa;
use App\Models\Mitra;
use App\Models\Skill;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUserLogin = Auth::id();
        $user = User::where("id", $idUserLogin)->first();
        switch ($user->role_id) {
            case '1':
                $depart = Departemen::where("user_id", $idUserLogin)->first();
                return view('depart.profile.index', compact('depart'));
                break;
            case '2':
                $mitra = Mitra::where("user_id", $idUserLogin)->first();
                return view('mitra.profile.index', compact('mitra'));
                break;
            case '3':
                $dosen = Dosen::where("user_id", $idUserLogin)->first();
                return view('dosen.profile.index', compact('dosen'));
                break;
            case '4':
                $spv = Supervisor::where("user_id", $idUserLogin)->first();
                return view('spv.profile.index', compact('spv'));
                break;
            case '5':
                $mhs = Mahasiswa::where("user_id", $idUserLogin)->first();
                return view('mhs.profile.index', compact('mhs'));
                break;
        };
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idUserLogin = Auth::id();
        $user = User::where("id", $idUserLogin)->first();
        switch ($user->role_id) {
            case '1':
                $depart = Departemen::where("user_id", $idUserLogin)->first();
                return view('depart.profile.edit', compact('depart'));
                break;
            case '2':
                $mitra = Mitra::where("user_id", $idUserLogin)->first();
                $kabupatens = Kabupaten::all();
                return view('mitra.profile.edit', compact('mitra', 'kabupatens'));
                break;
            case '3':
                $dosen = Dosen::where("user_id", $idUserLogin)->first();
                return view('dosen.profile.edit', compact('dosen'));
                break;
            case '4':
                $spv = Supervisor::where("user_id", $idUserLogin)->first();
                return view('spv.profile.edit', compact('spv'));
                break;
            case '5':
                $mhs = Mahasiswa::where("user_id", $idUserLogin)->first();
                $jurusan = Jurusan::all();
                $skill = Skill::all();
                $gender = ['Laki-laki','Perempuan'];
                return view('mhs.profile.edit', compact('mhs', 'jurusan', 'skill', 'gender'));
                break;
        };
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
        $idUserLogin = Auth::id();
        $user = $request->user();
        switch ($user->role_id) {
            case '1':
                $depart = Departemen::where("user_id", $idUserLogin)->first();
                $request->validate([
                    'nama' => 'required',
                    'alamat' => 'required',
                    'telepon' => 'required',
                    'NIDN' => 'required',
                    'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $imageName = time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('images'), $imageName);
                $depart->update($request->all());
                return redirect()->route('profile.index');
                break;
            case '2':
                $mitra = Mitra::where("user_id", $idUserLogin)->first();
                $request->validate([
                    'nama' => 'required',
                    'alamat' => 'required',
                    'telepon' => 'required',
                    'fax' => 'required',
                    'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'kab_id' => 'required',
                ]);

                $imageName = time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('images'), $imageName);
                $mitra->update($request->all());
                return redirect()->route('profile.index');
                break;
            case '3':
                $dosen = Dosen::where("user_id", $idUserLogin)->first();
                $request->validate([
                    'nama' => 'required',
                    'telepon' => 'required',
                    'NIP' => 'required',
                    'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $imageName = time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('images'), $imageName);
                $dosen->update($request->all());
                return redirect()->route('profile.index');
                break;
            case '4':
                $spv = Supervisor::where("user_id", $idUserLogin)->first();
                $request->validate([
                    'nama' => 'required',
                    'telepon' => 'required',
                    'no_pegawai' => 'required',
                    'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $imageName = time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('images'), $imageName);
                $spv->update($request->all());
                return redirect()->route('profile.index');
                break;
            case '5':
                $mhs = Mahasiswa::where("user_id", $idUserLogin)->first();
                $request->validate([
                    'nama' => 'required',
                    'NIM' => 'required',
                    'telepon' => 'required',
                    'pengalaman' => 'required',
                    'jurusan_id' => 'required',
                    'skill_id' => 'required',
                    'jenis_kelamin' => 'required',
                    'tgl_lahir' => 'required',
                    'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $imageName = time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('images'), $imageName);
                $mhs->update($request->all());
                return redirect()->route('profile.index');
                break;
        }
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
