@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detail Pembayaran</span>
                    <a href="{{ route('pembayarans.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kode Transaksi</th>
                            <td>{{ $pembayaran->transaksi->kode_transaksi }}</td>
                        </tr>
                        <tr>
                            <th>Metode</th>
                            <td>{{ $pembayaran->metode }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Bayar</th>
                            <td>Rp{{ number_format($pembayaran->jumlah_bayar, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Kembalian</th>
                            <td>Rp{{ number_format($pembayaran->kembalian, 2, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
