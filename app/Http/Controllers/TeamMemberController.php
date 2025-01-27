<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all();
        return view('team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'nullable|image|max:2048',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        // Guardar imagen
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team_images', 'public');
            $validated['image'] = $imagePath;
        }

        TeamMember::create($validated);

        return redirect()->route('team.index')->with('success', 'Miembro del equipo agregado correctamente.');
    }

    public function edit($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('team.edit', compact('teamMember'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'nullable|image|max:2048',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $teamMember = TeamMember::findOrFail($id);

        // Guardar nueva imagen si se sube una
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team_images', 'public');
            $validated['image'] = $imagePath;
        }

        $teamMember->update($validated);

        return redirect()->route('team.index')->with('success', 'Miembro del equipo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        $teamMember->delete();

        return redirect()->route('team.index')->with('success', 'Miembro del equipo eliminado correctamente.');
    }
}
