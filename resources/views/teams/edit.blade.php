@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Team</h1>

    <form action="{{ route('teams.update', $team->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Manager</label>
            <select name="manager_id" class="form-select" required>
                <option value="">-- Pilih Manager --</option>
                @foreach ($users as $user)
                    @if ($user->role === 'manager')
                        <option value="{{ $user->id }}" 
                            {{ old('manager_id', $team->manager_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">User</label>
            <select name="user_id" class="form-select" required>
                <option value="">-- Pilih User --</option>
                @foreach ($users as $user)
                    @if ($user->role === 'user')
                        <option value="{{ $user->id }}" 
                            {{ old('user_id', $team->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Project</label>
            <select name="project_id" class="form-select" required>
                <option value="">-- Pilih Project --</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" 
                        {{ old('project_id', $team->project_id) == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('teams.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
