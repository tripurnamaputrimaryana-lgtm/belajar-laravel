@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Tambah Detail Transaksi</span>
                    <div>
                        <a href="{{ route('detail-transaksis.index') }}" class="btn btn-sm btn-outline-secondary me-2">Batal</a>
                        <button type="submit" form="form-detail-transaksi" class="btn btn-sm btn-outline-success">Simpan</button>
                    </div>
                </div>

                <div class="card-body">
                    <form id="form-detail-transaksi" action="{{ route('detail-transaksis.store') }}" method="POST">
                        @csrf
                        <table class="table table-borderless">
                            <tr>
                                <th>Transaksi</th>
                                <td>
                                    <select name="transaksi_id" class="form-control @error('transaksi_id') is-invalid @enderror">
                                        <option value="">-- Pilih Transaksi --</option>
                                        @foreach ($transaksis as $transaksi)
                                            <option value="{{ $transaksi->id }}" {{ old('transaksi_id') == $transaksi->id ? 'selected' : '' }}>
                                                {{ $transaksi->kode_transaksi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('transaksi_id')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Produk</th>
                                <td>
                                    <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror">
                                        <option value="">-- Pilih Produk --</option>
                                        @foreach ($produks as $produk)
                                            <option value="{{ $produk->id }}" {{ old('produk_id') == $produk->id ? 'selected' : '' }}>
                                                {{ $produk->nama_produk }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('produk_id')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>
                                    <input type="number" name="jumlah" value="{{ old('jumlah') }}" class="form-control @error('jumlah') is-invalid @enderror">
                                    @error('jumlah')
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
