<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $teams = Group::all();
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'email'    => 'required|email|unique:teams,email',
            'password' => 'required|min:6',
        ]);

        Team::create([
            'nama_tim' => $request->nama_tim,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('groups.index')->with('success', 'Tim baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $group = Group::findOrFail($id);
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $group = Group::findOrFail($id);

        $request->validate([
            'nama_group' => 'required|string|max:255',
            'email'      => 'required|email|unique:groups,email,' . $group->id,
            'password'   => 'nullable|min:6',
        ]);

        $data = [
            'nama_group' => $request->nama_group,
            'email'      => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $group->update($data);

        return redirect()->route('groups.index')->with('success', 'Group berhasil diperbarui.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group berhasil dihapus.');
    }
}
