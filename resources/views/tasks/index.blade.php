@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Daftar Task</h1>

    {{-- 🔒 Tombol tambah hanya muncul kalau manager --}}
    @can('isManager')
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Tambah Task</a>
    @endcan

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Project</th>
                <th>User</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->title }}</td>
                    <td>
                        <span class="badge 
                            @if($task->status === 'selesai') bg-success 
                            @elseif($task->status === 'sedang_dikerjakan') bg-warning 
                            @else bg-secondary @endif">
                            {{ ucfirst(str_replace('_',' ',$task->status)) }}
                        </span>
                    </td>
                    <td>{{ $task->project->name ?? '-' }}</td>
                    <td>{{ $task->user->name ?? '-' }}</td>
                    <td>{{ $task->created_at->format('d-m-Y') }}</td>
                    <td>
                        {{-- Semua role bisa lihat detail --}}
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">Detail</a>

                        {{-- 🔒 Edit & hapus hanya manager --}}
                        @can('isManager')
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus task ini?')" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Belum ada task</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
