@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Data Dosen</h1>
    <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIPD</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dosen as $index => $d)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->nipd }}</td>
                <td>
                    <a href="{{ route('dosen.edit', $d->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{ route('dosen.show', $d->id) }}" class="btn btn-warning btn-sm">Show</a>
                    <form action="{{ route('dosen.destroy', $d->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection