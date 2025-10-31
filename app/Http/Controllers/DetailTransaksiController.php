<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\ProdukStok;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        $detailTransaksis = DetailTransaksi::with(['transaksi', 'produk'])->get();
        return view('detail_transaksis.index', compact('detailTransaksis'));
    }

    public function create()
    {
        $transaksis = Transaksi::all();
        $produks    = ProdukStok::all();
        return view('detail_transaksis.create', compact('transaksis', 'produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'produk_id'    => 'required|exists:produk_stoks,id',
            'jumlah'       => 'required|integer|min:1',
        ]);

        $produk   = ProdukStok::findOrFail($request->produk_id);
        $subtotal = $request->jumlah * $produk->harga;

        DetailTransaksi::create([
            'transaksi_id' => $request->transaksi_id,
            'produk_id'    => $request->produk_id,
            'jumlah'       => $request->jumlah,
            'subtotal'     => $subtotal,
        ]);

        return redirect()->route('detail-transaksis.index');
    }

    public function show(DetailTransaksi $detailTransaksi)
    {
        return view('detail_transaksis.show', compact('detailTransaksi'));
    }

    public function edit(DetailTransaksi $detailTransaksi)
    {
        $transaksis = Transaksi::all();
        $produks    = ProdukStok::all();
        return view('detail_transaksis.edit', compact('detailTransaksi', 'transaksis', 'produks'));
    }

    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'produk_id'    => 'required|exists:produk_stoks,id',
            'jumlah'       => 'required|integer|min:1',
        ]);

        $produk   = ProdukStok::findOrFail($request->produk_id);
        $subtotal = $request->jumlah * $produk->harga;

        $detailTransaksi->update([
            'transaksi_id' => $request->transaksi_id,
            'produk_id'    => $request->produk_id,
            'jumlah'       => $request->jumlah,
            'subtotal'     => $subtotal,
        ]);

        return redirect()->route('detail-transaksis.index');
    }

    public function destroy(DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->delete();
        return redirect()->route('detail-transaksis.index');
    }
}
