<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // Show list of all projects
    public function index()
    {
        $projects = Project::all();
        return view('dashboard.projects.index', compact('projects'));
    }

    // Show form to create a new project
    public function create()
    {
        return view('dashboard.projects.create');
    }

    // Store a new project
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'nullable|date',
            'url' => 'nullable|url',
            'slug' => 'required|string|unique:projects,slug',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Handle file upload for thumbnail
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        // Create new project
        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'url' => $request->url,
            'thumbnail' => $thumbnailPath,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    // Show form to edit a project
    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    // Update an existing project
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'nullable|date',
        'url' => 'nullable|url',
        'slug' => 'required|string|unique:projects,slug,' . $project->id,
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:255',
        'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Handle file upload for thumbnail (if updated)
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $project->thumbnail = $thumbnailPath;
        }

        // Update project details
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'url' => $request->url,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    // Delete a project
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
