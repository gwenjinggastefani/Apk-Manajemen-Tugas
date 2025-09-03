@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Projects</h3>
    <a href="{{ route('projects.create') }}" class="btn btn-success">+ Tambah Project</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Progress</th>
            <th>Tasks</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($projects as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td><a href="{{ route('projects.show', $p) }}">{{ $p->name }}</a></td>
                <td>{{ \Illuminate\Support\Str::limit($p->description, 80) }}</td>
                <td>{{ $p->progress }}%</td>
                <td>{{ $p->tasks_count }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('projects.edit', $p) }}">Edit</a>
                    <form action="{{ route('projects.destroy', $p) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus project?')">Hapus</button>
                    </form>
                    <a class="btn btn-sm btn-secondary" href="{{ route('projects.show', $p) }}">Lihat</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">Belum ada project</td></tr>
        @endforelse
    </tbody>
</table>
@endsection