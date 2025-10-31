@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Edit Produk</span>
                    <div>
                        <a href="{{ route('produk-stok.index') }}" class="btn btn-sm btn-outline-secondary me-2">Kembali</a>
                        <button type="submit" form="form-produk" class="btn btn-sm btn-outline-success">Simpan Perubahan</button>
                    </div>
                </div>

                <div class="card-body">
                    <form id="form-produk" action="{{ route('produk-stok.update', $produk) }}" method="post">
                        @csrf
                        @method('PUT')
                        <table class="table table-borderless">
                            <tr>
                                <th>Nama Produk</th>
                                <td>
                                    <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" class="form-control @error('nama_produk') is-invalid @enderror">
                                    @error('nama_produk')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>
                                    <input type="number" step="0.01" name="harga" value="{{ old('harga', $produk->harga) }}" class="form-control @error('harga') is-invalid @enderror">
                                    @error('harga')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>
                                    <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}" class="form-control @error('stok') is-invalid @enderror">
                                    @error('stok')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
