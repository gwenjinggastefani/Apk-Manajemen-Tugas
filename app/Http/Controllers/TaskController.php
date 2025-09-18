<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    // Semua role bisa lihat daftar task
    public function index()
    {
        if (auth()->user()->role === 'manager') {
            $tasks = Task::with(['project', 'user'])->get();
        } else {
            $tasks = Task::where('user_id', auth()->id())->with(['project'])->get();
        }

        return view('tasks.index', compact('tasks'));
    }

    // Semua role bisa lihat detail task mereka
    public function show(Task $task)
    {
        if (auth()->user()->role !== 'manager' && $task->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak.');
        }

        return view('tasks.show', compact('task'));
    }

    // 🔒 Khusus manager
    public function create()
    {
        if (!Gate::allows('isManager')) {
            abort(403, 'Akses ditolak, hanya manager.');
        }

        $projects = Project::where('user_id', auth()->id())->get();

        $users = User::where('role', 'user')
            ->whereIn('id', function ($query) {
                $query->select('user_id')
                    ->from('teams')
                    ->whereIn('project_id', Project::where('user_id', auth()->id())->pluck('id'));
            })
            ->get();

        return view('tasks.create', compact('projects', 'users'));
    }

    // 🔒 Khusus manager
    public function store(Request $request)
    {
        if (!Gate::allows('isManager')) {
            abort(403, 'Akses ditolak, hanya manager.');
        }

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'deadline'    => 'required|date|after:now',
            'project_id'  => 'required|exists:projects,id',
            'status' => 'required|in:belum_dikerjakan,sedang_dikerjakan,selesai',
            'user_id'     => 'required|exists:users,id',
        ]);

        if (Task::where('user_id', $request->user_id)->exists()) {
            return back()->withErrors(['user_id' => 'User ini sudah memiliki tugas.']);
        }

        if (!Project::where('id', $request->project_id)->where('user_id', auth()->id())->exists()) {
            return back()->withErrors(['project_id' => 'Project ini bukan milik Anda.']);
        }

        Task::create($request->only('title', 'description', 'deadline', 'status', 'project_id', 'user_id'));

        return redirect()->route('tasks.index')->with('success', 'Task berhasil dibuat.');
    }

    // 🔒 Khusus manager
    public function edit(Task $task)
    {
        if (!Gate::allows('isManager')) {
            abort(403, 'Akses ditolak, hanya manager.');
        }

        $projects = Project::where('user_id', auth()->id())->get();

        $users = User::where('role', 'user')
            ->whereIn('id', function ($query) use ($task) {
                $query->select('user_id')
                    ->from('teams')
                    ->where('project_id', $task->project_id);
            })
            ->get();

        return view('tasks.edit', compact('task', 'projects', 'users'));
    }

    // Manager bisa update semua field, user hanya status
    public function update(Request $request, Task $task)
    {
        if (auth()->user()->role !== 'manager' && $task->user_id !== auth()->id()) {
            abort(403, 'Akses ditolak.');
        }

        if (!Gate::allows('isManager')) {
            // User hanya update status
            $request->validate([
                'status' => 'required|in:belum_dikerjakan,sedang_dikerjakan,selesai',
            ]);

            $task->update(['status' => $request->status]);
        } else {
            // Manager bisa update semua
            $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'deadline'    => 'required|date|after:now',
                'project_id'  => 'required|exists:projects,id',
                'status'      => 'required|in:belum_dikerjakan,sedang_dikerjakan,selesai',
                'user_id'     => 'required|exists:users,id',
            ]);

            if ($request->user_id != $task->user_id && Task::where('user_id', $request->user_id)->exists()) {
                return back()->withErrors(['user_id' => 'User ini sudah memiliki tugas.']);
            }

            if (!Project::where('id', $request->project_id)->where('user_id', auth()->id())->exists()) {
                return back()->withErrors(['project_id' => 'Project ini bukan milik Anda.']);
            }

            $task->update($request->only('title', 'description', 'deadline', 'status', 'project_id', 'user_id'));
        }

        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui.');
    }

    // 🔒 Khusus manager
    public function destroy(Task $task)
    {
        if (!Gate::allows('isManager')) {
            abort(403, 'Akses ditolak, hanya manager.');
        }

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus.');
    }
}
