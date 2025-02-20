<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\Experience;
use App\Models\Setting; // Ensure to import the Setting model
use Illuminate\Http\Request;

use App\Models\Theme;

class PortfolioController extends Controller
{
    // Display the portfolio home page
    public function index(Request $request)
    {
        // Fetch all data required for the view
        $projects = Project::all();
        $skills = Skill::all();
        $testimonials = Testimonial::all();
        $experiences = Experience::all();

        // Fetch settings from the database
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        if ($request->has('theme')) {
            $theme = Theme::find($request->theme);
        } else {
            $theme = Theme::when(session()->has('active_theme'), function ($query) {
                return $query->where('id', session('active_theme'));
            })->first();
        }

        // Return the view with all required data
        return view('portfolio.index', compact('projects', 'skills', 'testimonials', 'experiences', 'settings', 'theme'));
    }
}
