@extends('layouts.app')

@section('content')
<h1>Edit Proyek</h1>
<form method="POST" action="{{ route('projects.update', $project->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Proyek</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control">{{ old('description', $project->description) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
