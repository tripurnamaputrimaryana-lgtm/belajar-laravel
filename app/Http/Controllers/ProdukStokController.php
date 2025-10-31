<?php

namespace App\Http\Controllers;

use App\Models\ProdukStok;
use Illuminate\Http\Request;

class ProdukStokController extends Controller
{
    public function index()
    {
        $produks = ProdukStok::all();
        return view('produk_stok.index', compact('produks'));
    }

    public function create()
    {
        return view('produk_stok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
        ]);

        ProdukStok::create($request->only(['nama_produk', 'harga', 'stok']));
        return redirect()->route('produk-stok.index');
    }

    public function show(ProdukStok $produk)
    {
        return view('produk_stok.show', compact('produk'));
    }

    public function edit(ProdukStok $produk)
    {
        return view('produk_stok.edit', compact('produk'));
    }

    public function update(Request $request, ProdukStok $produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
        ]);

        $produk->update($request->only(['nama_produk', 'harga', 'stok']));
        return redirect()->route('produk-stok.index');
    }

    public function destroy(ProdukStok $produk)
    {
        $produk->delete();
        return redirect()->route('produk-stok.index');
    }
}
