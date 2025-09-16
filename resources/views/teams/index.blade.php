@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Daftar Team</h1>

    {{-- 🔒 Tombol tambah hanya untuk Manager --}}
    @can('isManager')
        <a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Tambah Team</a>
    @endcan

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Manager</th>
                <th>User</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teams as $team)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $team->manager->name ?? '-' }}</td>
                    <td>{{ $team->user->name ?? '-' }}</td>
                    <td>{{ $team->created_at->format('d-m-Y') }}</td>
                    <td>
                        {{-- Semua role bisa lihat detail --}}
                        <a href="{{ route('teams.show', $team->id) }}" class="btn btn-info btn-sm">Detail</a>

                       
                        {{-- Kalau manager → bisa edit & hapus --}}
                        @can('isManager')
                            <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus team ini?')" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        @endcan

                        
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada team</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
