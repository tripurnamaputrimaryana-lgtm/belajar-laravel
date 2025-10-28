<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Wali;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    public function index()
    {
        $walis = Wali::with('mahasiswa')->latest()->get();
        return view('wali.index', compact('walis'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('wali.create', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:100',
            'id_mahasiswa' => 'required|exists:mahasiswas,id|unique:walis,id_mahasiswa',
        ]);

        Wali::create($validated);
        return redirect()->route('wali.index')->with('success', 'Data wali berhasil disimpan');
    }

    public function show($id)
    {
        $wali = Wali::with('mahasiswa')->findOrFail($id);
        return view('wali.show', compact('wali'));
    }

    public function edit($id)
    {
        $wali      = Wali::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        return view('wali.edit', compact('wali', 'mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:100',
            'id_mahasiswa' => 'required|exists:mahasiswas,id|unique:walis,id_mahasiswa,' . $id,
        ]);

        $wali = Wali::findOrFail($id);
        $wali->update($validated);
        return redirect()->route('wali.index')->with('success', 'Data wali berhasil diperbarui');
    }

    public function destroy($id)
    {
        $wali = Wali::findOrFail($id);
        $wali->delete();
        return redirect()->route('wali.index')->with('success', 'Data wali berhasil dihapus');
    }
}
