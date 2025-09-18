<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:manager')->except('index', 'show');
    }

    public function index()
    {
        $currentUser = auth()->user();
        if ($currentUser->role === 'manager') {
            $teams = Team::with(['manager', 'user', 'project'])
                ->where('manager_id', $currentUser->id)
                ->get();
        } else {
            $teams = Team::with(['manager', 'user', 'project'])
                ->where('user_id', $currentUser->id)
                ->get();
        }
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        $users = User::where('role', 'manager')->get();
        $projects = Project::where('user_id', auth()->id())->get();
        return view('teams.create', compact('users', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'manager_id' => 'required|exists:users,id',
            'new_user_name' => 'required|string|max:255',
            'new_user_email' => 'required|email|unique:users,email',
            'new_user_password' => 'required|string|min:8',
            'project_id' => 'required|exists:projects,id',
        ]);

        if (!Project::where('id', $request->project_id)->where('user_id', auth()->id())->exists()) {
            return back()->withErrors(['project_id' => 'Proyek ini bukan milik Anda.']);
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->new_user_name,
            'email' => $request->new_user_email,
            'password' => Hash::make($request->new_user_password),
            'role' => 'user',
        ]);

        // Cek duplikasi user dalam proyek
        if (Team::where('user_id', $user->id)->where('project_id', $request->project_id)->exists()) {
            return back()->withErrors(['new_user_email' => 'User ini sudah tergabung dalam tim untuk proyek ini.']);
        }

        Team::create([
            'manager_id' => $request->manager_id,
            'user_id' => $user->id,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('teams.index')->with('success', 'Tim berhasil dibuat.');
    }

    public function show(Team $team)
    {
        $currentUser = auth()->user();
        if ($currentUser->role === 'manager') {
            if ($team->manager_id !== $currentUser->id) {
                return redirect()->route('teams.index')->with('error', 'Akses ditolak.');
            }
        } else {
            if ($team->user_id !== $currentUser->id) {
                return redirect()->route('teams.index')->with('error', 'Akses ditolak.');
            }
        }
        $team->load(['manager', 'user', 'project']);
        return view('teams.show', compact('team'));
    }

    public function edit(Team $team)
    {
        if (auth()->user()->role !== 'manager' || $team->manager_id !== auth()->id()) {
            return redirect()->route('teams.index')->with('error', 'Akses ditolak.');
        }
        $users = User::where('role', 'manager')->get();
        $projects = Project::where('user_id', auth()->id())->get();
        return view('teams.edit', compact('team', 'users', 'projects'));
    }

    public function update(Request $request, Team $team)
    {
        if (auth()->user()->role !== 'manager' || $team->manager_id !== auth()->id()) {
            return redirect()->route('teams.index')->with('error', 'Akses ditolak.');
        }

        $request->validate([
            'manager_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        if (!Project::where('id', $request->project_id)->where('user_id', auth()->id())->exists()) {
            return back()->withErrors(['project_id' => 'Proyek ini bukan milik Anda.']);
        }

        $team->update([
            'manager_id' => $request->manager_id,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('teams.index')->with('success', 'Tim berhasil diperbarui.');
    }

    public function destroy(Team $team)
    {
        if (auth()->user()->role !== 'manager' || $team->manager_id !== auth()->id()) {
            return redirect()->route('teams.index')->with('error', 'Akses ditolak.');
        }

        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Tim berhasil dihapus.');
    }
}