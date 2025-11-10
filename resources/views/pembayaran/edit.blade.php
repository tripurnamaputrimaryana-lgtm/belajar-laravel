@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Edit Pembayaran</span>
                    <div>
                        <a href="{{ route('pembayarans.index') }}" class="btn btn-sm btn-outline-secondary me-2">Batal</a>
                        <button type="submit" form="form-pembayaran" class="btn btn-sm btn-outline-success">Simpan</button>
                    </div>
                </div>

                <div class="card-body">
                    <form id="form-pembayaran" action="{{ route('pembayarans.update', $pembayaran->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="table table-borderless">
                            <tr>
                                <th>Transaksi</th>
                                <td>
                                    <select name="transaksi_id" class="form-control @error('transaksi_id') is-invalid @enderror">
                                        <option value="">-- Pilih Transaksi --</option>
                                        @foreach ($transaksis as $transaksi)
                                            <option value="{{ $transaksi->id }}" {{ old('transaksi_id', $pembayaran->transaksi_id) == $transaksi->id ? 'selected' : '' }}>
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
                                <th>Metode Pembayaran</th>
                                <td>
                                    <select name="metode" class="form-control @error('metode') is-invalid @enderror">
                                        <option value="">-- Pilih Metode --</option>
                                        <option value="Tunai" {{ old('metode', $pembayaran->metode) == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                                        <option value="Transfer Bank" {{ old('metode', $pembayaran->metode) == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                                        <option value="QRIS" {{ old('metode', $pembayaran->metode) == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                                        <option value="E-Wallet" {{ old('metode', $pembayaran->metode) == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                                        <option value="Kartu Kredit" {{ old('metode', $pembayaran->metode) == 'Kartu Kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                                    </select>
                                    @error('metode')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Jumlah Bayar</th>
                                <td>
                                    <input type="number" step="0.01" name="jumlah_bayar" value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}" class="form-control @error('jumlah_bayar') is-invalid @enderror">
                                    @error('jumlah_bayar')
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
