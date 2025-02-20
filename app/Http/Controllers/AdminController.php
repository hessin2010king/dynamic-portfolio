<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\Experience;
use App\Models\Theme;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Fetching data for widgets
        $projectCount = Project::count();
        $skillCount = Skill::count();
        $testimonialCount = Testimonial::count();
        $experienceCount = Experience::count();
        $themeCount = Theme::count();

        return view('dashboard.index', compact('projectCount', 'skillCount', 'testimonialCount', 'experienceCount', 'themeCount'));
    }
}
