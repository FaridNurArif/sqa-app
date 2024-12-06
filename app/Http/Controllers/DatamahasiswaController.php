<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Datamahasiswa;

class DatamahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datamahasiswas = Datamahasiswa::all();
        return view('datamahasiswa.index', compact('datamahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('datamahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nim' => 'required|unique:datamahasiswas',
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'email' => 'required|email|unique:datamahasiswas',
            'alamat_tinggal' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }
    
        Datamahasiswa::create($data);
    
        return redirect()->route('datamahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Datamahasiswa $datamahasiswa)
    {
        //
        return view('datamahasiswa.show', compact('datamahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datamahasiswa $datamahasiswa)
    {
        //
        return view('datamahasiswa.edit', compact('datamahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Datamahasiswa $datamahasiswa)
    {
        //
        $request->validate([
            'nim' => 'required|unique:datamahasiswas,nim,' . $datamahasiswa->id,
            'nama_lengkap' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'email' => 'required|email|unique:datamahasiswas,email,' . $datamahasiswa->id,
            'alamat_tinggal' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('foto')) {
            if ($datamahasiswa->foto) {
                Storage::disk('public')->delete($datamahasiswa->foto);
            }
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }
    
        $datamahasiswa->update($data);
    
        return redirect()->route('datamahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datamahasiswa $datamahasiswa)
    {
        //
        if ($datamahasiswa->foto) {
            Storage::disk('public')->delete($datamahasiswa->foto);
        }
    
        $datamahasiswa->delete();
    
        return redirect()->route('datamahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus');
    }
}
