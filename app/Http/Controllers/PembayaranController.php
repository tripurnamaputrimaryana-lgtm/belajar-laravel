<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('transaksi')->get();
        return view('pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        $transaksis = Transaksi::all();
        return view('pembayarans.create', compact('transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'metode'       => 'required|string|max:50',
            'jumlah_bayar' => 'required|numeric|min:0',
        ]);

        $transaksi = Transaksi::findOrFail($request->transaksi_id);
        $kembalian = $request->jumlah_bayar - $transaksi->total_harga;

        Pembayaran::create([
            'transaksi_id' => $request->transaksi_id,
            'metode'       => $request->metode,
            'jumlah_bayar' => $request->jumlah_bayar,
            'kembalian'    => $kembalian,
        ]);

        return redirect()->route('pembayarans.index');
    }

    public function show(Pembayaran $pembayaran)
    {
        return view('pembayarans.show', compact('pembayaran'));
    }

    public function edit(Pembayaran $pembayaran)
    {
        $transaksis = Transaksi::all();
        return view('pembayarans.edit', compact('pembayaran', 'transaksis'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'metode'       => 'required|string|max:50',
            'jumlah_bayar' => 'required|numeric|min:0',
        ]);

        $transaksi = Transaksi::findOrFail($request->transaksi_id);
        $kembalian = $request->jumlah_bayar - $transaksi->total_harga;

        $pembayaran->update([
            'transaksi_id' => $request->transaksi_id,
            'metode'       => $request->metode,
            'jumlah_bayar' => $request->jumlah_bayar,
            'kembalian'    => $kembalian,
        ]);

        return redirect()->route('pembayarans.index');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayarans.index');
    }
}
