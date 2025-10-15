@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Show Data Dosen</h1>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" value="{{ $dosen->nama }}" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">NIPD</label>
        <input type="text" class="form-control" value="{{ $dosen->nipd }}" readonly>
    </div>

    <a href="{{ route('dosen.index') }}" class="btn btn-success">Kembali</a>
</div>
@endsection