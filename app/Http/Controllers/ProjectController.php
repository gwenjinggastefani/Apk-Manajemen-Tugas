<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    // Semua role bisa lihat daftar project
    public function index()
    {
        $projects = Project::with('tasks')->get();
        return view('projects.index', compact('projects'));
    }

    // Semua role bisa lihat detail
    public function show(Project $project)
    {
        $project->load('tasks');
        return view('projects.show', compact('project'));
    }

    // 🔒 Khusus manager
    public function create()
    {
        if (!Gate::allows('isManager')) {
            abort(403, 'Akses ditolak, hanya manager.');
        }

        $users = \App\Models\User::all();
        return view('projects.create', compact('users'));
    }

    // 🔒 Khusus manager
    public function store(Request $request)
    {
        if (!Gate::allows('isManager')) {
            abort(403, 'Akses ditolak, hanya manager.');
        }

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:in_progress,done',
            'user_id'     => 'required|exists:users,id',
        ]);

        Project::create($request->only('name', 'description', 'status', 'user_id'));

        return redirect()->route('projects.index')->with('success', 'Project berhasil dibuat.');
    }

    // 🔒 Khusus manager
    public function edit(Project $project)
    {
        if (!Gate::allows('isManager')) {
            abort(403, 'Akses ditolak, hanya manager.');
        }

        return view('projects.edit', compact('project'));
    }

    // 🔒 Khusus manager
    public function update(Request $request, Project $project)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:in_progress,done',
    ]);

    $project->update($request->all());

    return redirect()->route('projects.index')->with('success', 'Project berhasil diupdate.');
}


    // 🔒 Khusus manager
    public function destroy(Project $project)
    {
        if (!Gate::allows('isManager')) {
            abort(403, 'Akses ditolak, hanya manager.');
        }

        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus.');
    }
}
