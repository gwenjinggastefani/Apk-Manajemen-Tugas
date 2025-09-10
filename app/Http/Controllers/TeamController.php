<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Team; 
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data tim dengan relasi manager & user
        $teams = Team::with(['manager', 'user'])->get();
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); 
        return view('teams.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'manager_id' => 'required|exists:users,id',
            'user_id'    => 'required|exists:users,id',
        ]);

        Team::create([
            'manager_id' => $request->manager_id,
            'user_id'    => $request->user_id,
        ]);

        return redirect()->route('teams.index')->with('success', 'Team berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $users = User::all(); 
        return view('teams.edit', compact('team', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'manager_id' => 'required|exists:users,id',
            'user_id'    => 'required|exists:users,id',
        ]);

        $team->update([
            'manager_id' => $request->manager_id,
            'user_id'    => $request->user_id,
        ]);

        return redirect()->route('teams.index')->with('success', 'Team berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team berhasil dihapus.');
    }
}