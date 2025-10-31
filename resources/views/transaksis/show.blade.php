@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detail Transaksi
                    <a href="{{ route('transaksis.index') }}" class="btn btn-sm btn-outline-secondary float-end">Kembali</a>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kode Transaksi</th>
                            <td>{{ $transaksi->kode_transaksi }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Pelanggan</th>
                            <td>{{ $transaksi->pelanggan->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td>Rp {{ number_format($transaksi->total_harga, 2, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
