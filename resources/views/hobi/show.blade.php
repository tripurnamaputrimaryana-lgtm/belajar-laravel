@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Hobi</h2>

    <div class="mb-3">
        <label class="form-label">Nama Hobi:</label>
        <div class="form-control">{{ $hobi->nama_hobi }}</div>
    </div>

    <a href="{{ route('hobi.index') }}" class="btn btn-success">Kembali</a>
</div>
@endsection