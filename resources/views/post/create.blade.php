@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <fieldset>Tambah Data Post</fieldset>
            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" require>
                </div>
                <div class="mb-3">
                    <label for="">content</label>
                    <textarea name="content" class="form-control" require></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection