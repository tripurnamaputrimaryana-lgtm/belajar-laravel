@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detail Mahasiswa
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-outline-secondary float-end">Kembali</a>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <td>{{ $mahasiswa->nama }}</td>
                        </tr>
                        <tr>
                            <th>No Induk Mahasiswa</th>
                            <td>{{ $mahasiswa->nim }}</td>
                        </tr>
                        <tr>
                            <th>Nama Dosen</th>
                            <td>{{ $mahasiswa->dosen->nama ?? '-' }}</td>
                        </tr>
                        @if($mahasiswa->wali)
                        <tr>
                            <th>Nama Wali</th>
                            <td>{{ $mahasiswa->wali->nama }}</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
