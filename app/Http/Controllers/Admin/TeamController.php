<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->paginate(10);
        return view('admin.team.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'image' => 'nullable|string|max:255',
            'image_url' => 'nullable|string|max:255',
        ]);

        Team::create($request->all());

        return redirect()->route('admin.teams.index')->with('success', 'Team member created.');
    }


    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'image' => 'nullable|string|max:255',
            'image_url' => 'nullable|string|max:255',
        ]);

        $team->update($request->all());

        return redirect()->route('admin.teams.index')->with('success', 'Team member updated.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('admin.teams.index')->with('success', 'Team member deleted.');
    }
}

