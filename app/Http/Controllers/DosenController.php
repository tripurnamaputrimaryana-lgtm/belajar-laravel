<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'nullable',
        'nipd' => 'nullable|unique:dosens,nipd',
    ]);
        Dosen::create($request->only(['nama', 'nipd']));
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan');
    }
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
    $dosen->update([
    'nama' => $request->nama,
    'nidn' => $request->nidn,
    ]);

    return redirect()->route('dosen.index');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus');
    }

    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

}