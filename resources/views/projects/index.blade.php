@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Daftar Project</h1>

    {{-- 🔒 Tombol tambah hanya muncul kalau manager --}}
    @can('isManager')
        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Tambah Project</a>
    @endcan

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Project</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>User</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>
                        <span class="badge {{ $project->status === 'done' ? 'bg-success' : 'bg-warning' }}">
                            {{ ucfirst(str_replace('_',' ',$project->status)) }}
                        </span>
                    </td>
                    <td>{{ $project->user->name ?? '-' }}</td>
                    <td>{{ $project->created_at->format('d-m-Y') }}</td>
                    <td>
                       {{-- Semua role bisa lihat detail --}}
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <div class="d-flex gap-1">
                            
                        {{-- 🔒 Edit & hapus hanya manager --}}
                        
                            {{-- 🔒 Edit & hapus hanya manager --}}
                            @can('isManager')
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus project ini?')" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Belum ada project</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
