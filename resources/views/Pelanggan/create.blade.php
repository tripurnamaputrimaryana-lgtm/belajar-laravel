@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Tambah Data Pelanggan</span>
                    <div>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-sm btn-outline-secondary me-2">Batal</a>
                        <button type="submit" form="form-pelanggan" class="btn btn-sm btn-outline-success">Simpan</button>
                    </div>
                </div>

                <div class="card-body">
                    <form id="form-pelanggan" action="{{ route('pelanggan.store') }}" method="post">
                        @csrf
                        <table class="table table-borderless">
                            <tr>
                                <th>Nama</th>
                                <td>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                                    @error('nama')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                                    @error('alamat')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td>
                                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror">
                                    @error('no_hp')
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
