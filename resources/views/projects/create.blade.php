@extends('layouts.app')

@section('content')
<h1>Tambah Proyek</h1>
<form method="POST" action="{{ route('projects.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama Proyek</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
