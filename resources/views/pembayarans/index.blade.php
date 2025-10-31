@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">Pembayaran</div>
                    <div class="float-end">
                        <a href="{{ route('pembayarans.create') }}" class="btn btn-sm btn-outline-primary">Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Metode</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Kembalian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pembayarans as $no => $data)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $data->transaksi->kode_transaksi }}</td>
                                    <td>{{ $data->metode }}</td>
                                    <td>Rp{{ number_format($data->jumlah_bayar, 2, ',', '.') }}</td>
                                    <td>Rp{{ number_format($data->kembalian, 2, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('pembayarans.destroy', $data->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <a href="{{ route('pembayarans.show', $data->id) }}" class="btn btn-sm btn-outline-dark">Show</a> |
                                            <a href="{{ route('pembayarans.edit', $data->id) }}" class="btn btn-sm btn-outline-success">Edit</a> |
                                            <button type="submit" onclick="return confirm('Yakin ingin hapus?');" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="text-center">Data belum tersedia</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
