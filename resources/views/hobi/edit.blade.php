@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Data Hobi</h2>

    <form action="{{ route('hobi.update', $hobi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_hobi" class="form-label">Nama Hobi</label>
            <input type="text" name="nama_hobi" class="form-control" value="{{ $hobi->nama_hobi }}" placeholder="Contoh: Membaca Buku">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
