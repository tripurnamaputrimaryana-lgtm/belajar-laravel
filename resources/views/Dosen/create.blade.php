@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tambah Data Dosen</h1>

    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">NIPD</label>
            <input type="text" name="nipd" class="form-control" value="{{ old('nidn') }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection