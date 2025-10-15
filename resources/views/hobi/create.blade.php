@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Data Hobi</h2>

    <form action="{{ route('hobi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_hobi" class="form-label">Nama Hobi</label>
            <input type="text" name="nama_hobi" class="form-control" placeholder="Contoh: Membaca Buku">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
