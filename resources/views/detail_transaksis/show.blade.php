@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detail Item Transaksi</span>
                    <a href="{{ route('detail-transaksis.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kode Transaksi</th>
                            <td>{{ $detailTransaksi->transaksi->kode_transaksi }}</td>
                        </tr>
                        <tr>
                            <th>Produk</th>
                            <td>{{ $detailTransaksi->produk->nama_produk }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>{{ $detailTransaksi->jumlah }}</td>
                        </tr>
                        <tr>
                            <th>Subtotal</th>
                            <td>Rp{{ number_format($detailTransaksi->subtotal, 2, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
