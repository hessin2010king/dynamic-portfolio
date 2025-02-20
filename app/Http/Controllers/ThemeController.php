<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Testimonial;

class ThemeController extends Controller
{
    // Show list of all themes
    public function index()
    {
        $themes = Theme::paginate(4);
        return view('dashboard.themes.index', compact('themes'));
    }

    // Show form to create a new theme
    public function create()
    {
        return view('dashboard.themes.create');
    }

    // Store a new theme
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'css_path' => 'required|string|max:255',
        ]);

        Theme::create($request->all());

        return redirect()->route('themes.index')->with('success', 'Theme added successfully!');
    }

    // Show form to edit a theme
    public function edit(Theme $theme)
    {
        return view('dashboard.themes.edit', compact('theme'));
    }

    // Update an existing theme
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'css_path' => 'required|string|max:255',
        ]);

        $theme->update($request->all());

        return redirect()->route('themes.index')->with('success', 'Theme updated successfully!');
    }

    // Delete a theme
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('themes.index')->with('success', 'Theme deleted successfully!');
    }

    // Set active theme
    public function setActive(Request $request)
    {
        $request->validate([
            'theme_id' => 'required|exists:themes,id',
        ]);

        session(['active_theme' => $request->theme_id]);
        return redirect()->back()->with('success', 'Active theme set successfully!');
    }

    public function preview($themeId)
    {
        $theme = Theme::findOrFail($themeId);

        // Load necessary data to display on the portfolio
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        $skills = Skill::all(); // Fetch all skills
        $projects = Project::all(); // Fetch all projects
        $experiences = Experience::all(); // Fetch all experiences
        $testimonials = Testimonial::all(); // Fetch all testimonials
        return view('dashboard.themes.preview', compact('theme', 'settings', 'skills', 'projects', 'experiences', 'testimonials'));
    }
}
