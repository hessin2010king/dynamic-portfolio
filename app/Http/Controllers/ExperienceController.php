<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    // Show list of all experiences
    public function index()
    {
        $experiences = Experience::all();
        return view('dashboard.experiences.index', compact('experiences'));
    }

    // Show form to create a new experience
    public function create()
    {
        return view('dashboard.experiences.create');
    }

    // Store a new experience
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
        ]);

        Experience::create($request->all());

        return redirect()->route('experiences.index')->with('success', 'Experience added successfully!');
    }

    // Show form to edit an experience
    public function edit(Experience $experience)
    {
        return view('dashboard.experiences.edit', compact('experience'));
    }

    // Update an existing experience
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
        ]);

        $experience->update($request->all());

        return redirect()->route('experiences.index')->with('success', 'Experience updated successfully!');
    }

    // Delete an experience
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience deleted successfully!');
    }
}
