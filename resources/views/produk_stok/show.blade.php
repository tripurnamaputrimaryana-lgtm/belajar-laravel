@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detail Produk</span>
                    <a href="{{ route('produk-stok.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama Produk</th>
                            <td>{{ $produk->nama_produk }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>Rp{{ number_format($produk->harga, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>{{ $produk->stok }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
