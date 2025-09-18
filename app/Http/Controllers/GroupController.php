<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group; // <- pastikan ini ada
use Illuminate\Support\Facades\Hash;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all(); // sebelumnya $teams = Group::all()
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'email'    => 'required|email|unique:groups,email',
            'password' => 'required|min:6',
        ]);

        Group::create([
            'nama_tim' => $request->nama_tim,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('groups.index')->with('success', 'Tim baru berhasil ditambahkan!');
    }

    public function show($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.show', compact('group'));
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'email'    => 'required|email|unique:groups,email,' . $group->id,
            'password' => 'nullable|min:6',
        ]);

        $data = [
            'nama_tim' => $request->nama_tim,
            'email'    => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $group->update($data);

        return redirect()->route('groups.index')->with('success', 'Group berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group berhasil dihapus.');
    }
}
