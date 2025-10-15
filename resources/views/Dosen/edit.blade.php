@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Data Dosen</h1>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $dosen->nama) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">NIDN</label>
            <input type="text" name="nipd" class="form-control" value="{{ old('nipd', $dosen->nipd) }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection