<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('pelanggan')->get();
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('transaksis.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|string|max:20|unique:transaksis',
            'tanggal'        => 'required|date',
            'pelanggan_id'   => 'required|exists:pelanggans,id',
            'total_harga'    => 'required|numeric',
        ]);

        Transaksi::create($request->all());
        return redirect()->route('transaksis.index');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $pelanggans = Pelanggan::all();
        return view('transaksis.edit', compact('transaksi', 'pelanggans'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'kode_transaksi' => 'required|string|max:20|unique:transaksis,kode_transaksi,' . $transaksi->id,
            'tanggal'        => 'required|date',
            'pelanggan_id'   => 'required|exists:pelanggans,id',
            'total_harga'    => 'required|numeric',
        ]);

        $transaksi->update($request->all());
        return redirect()->route('transaksis.index');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksis.index');
    }
}
