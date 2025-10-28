@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Wali</div>

                <div class="card-body">
                    <form action="{{ route('wali.update', $wali->id) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="mb-3">
                            <label>Nama Wali</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $wali->nama) }}">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Mahasiswa</label>
                            <select name="id_mahasiswa" class="form-control @error('id_mahasiswa') is-invalid @enderror">
                                <option value="">-- Pilih Mahasiswa --</option>
                                @foreach($mahasiswa as $mhs)
                                    <option value="{{ $mhs->id }}" {{ $wali->id_mahasiswa == $mhs->id ? 'selected' : '' }}>
                                        {{ $mhs->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_mahasiswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <button class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
