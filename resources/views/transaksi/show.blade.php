@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Transaksi</h2>

    <table class="table table-bordered">
        <tr>
            <th>Kode Transaksi</th>
            <td>{{ $transaksi->kode_transaksi }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Pelanggan</th>
            <td>{{ $transaksi->pelanggan->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
        </tr>
    </table>

    <h4>Daftar Produk</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->produks as $produk)
                <tr>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $produk->pivot->jumlah ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
