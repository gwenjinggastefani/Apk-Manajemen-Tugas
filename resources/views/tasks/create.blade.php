@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul Task</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="in_progress" {{ old('status')=='in_progress'?'selected':'' }}>In Progress</option>
                <option value="done" {{ old('status')=='done'?'selected':'' }}>Done</option>
            </select>
        </div>
         <div class="mb-3">
            <label for="user_id" class="form-label">Pemilik Project</label>
            <select name="user_id" class="form-select" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})</option>
                @endforeach
            </select>
        </div>       

        <div class="mb-3">
            <label class="form-label">Project</label>
            <select name="project_id" class="form-select" required>
                <option value="">-- Pilih Project --</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project_id')==$project->id?'selected':'' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection