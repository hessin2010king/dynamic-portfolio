<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // Show list of all skills
    public function index()
    {
        $skills = Skill::all();
        return view('dashboard.skills.index', compact('skills'));
    }

    // Show form to create a new skill
    public function create()
    {
        return view('dashboard.skills.create');
    }

    // Store a new skill
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255' ,
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        Skill::create($request->all());

        return redirect()->route('skills.index')->with('success', 'Skill created successfully!');
    }

    // Show form to edit a skill
    public function edit(Skill $skill)
    {
        return view('dashboard.skills.edit', compact('skill'));
    }

    // Update an existing skill
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        $skill->update($request->all());

        return redirect()->route('skills.index')->with('success', 'Skill updated successfully!');
    }

    // Delete a skill
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully!');
    }
}
