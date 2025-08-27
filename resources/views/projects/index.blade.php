@extends('layouts.app')

@section('content')
<h1>Daftar Proyek</h1>
<a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Tambah Proyek</a>

@foreach($projects as $project)
    <div class="card mb-3">
        <div class="card-body">
            <h4>{{ $project->name }}</h4>
            <p>{{ $project->description }}</p>

            <h5>Tasks:</h5>
            <ul>
                @foreach($project->tasks as $task)
                    <li>{{ $task->title }} - <b>{{ $task->status }}</b> (oleh {{ $task->user->name }})</li>
                @endforeach
            </ul>
        </div>
    </div>
@endforeach
@endsection
