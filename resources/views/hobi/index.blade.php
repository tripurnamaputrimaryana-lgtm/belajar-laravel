@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Hobi</h2>

    <a href="{{ route('hobi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Hobi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hobi as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_hobi }}</td>
                <td>
                    <a href="{{ route('hobi.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{ route('hobi.show', $item->id) }}" class="btn btn-warning btn-sm">Show</a>
                    <form action="{{ route('hobi.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Belum ada data hobi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection