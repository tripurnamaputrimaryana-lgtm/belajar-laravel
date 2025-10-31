@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Tambah Transaksi</span>
                    <div>
                        <a href="{{ route('transaksis.index') }}" class="btn btn-sm btn-outline-secondary me-2">Batal</a>
                        <button type="submit" form="form-transaksi" class="btn btn-sm btn-outline-success">Simpan</button>
                    </div>
                </div>

                <div class="card-body">
                    <form id="form-transaksi" action="{{ route('transaksis.store') }}" method="post">
                        @csrf
                        <table class="table table-borderless">
                            <tr>
                                <th>Kode Transaksi</th>
                                <td>
                                    <input type="text" name="kode_transaksi" value="{{ old('kode_transaksi') }}" class="form-control @error('kode_transaksi') is-invalid @enderror">
                                    @error('kode_transaksi')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>
                                    <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror">
                                    @error('tanggal')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Pelanggan</th>
                                <td>
                                    <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror">
                                        <option value="">-- Pilih Pelanggan --</option>
                                        @foreach ($pelanggans as $pelanggan)
                                            <option value="{{ $pelanggan->id }}" {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                                                {{ $pelanggan->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pelanggan_id')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td>
                                    <input type="number" step="0.01" name="total_harga" value="{{ old('total_harga') }}" class="form-control @error('total_harga') is-invalid @enderror">
                                    @error('total_harga')
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
