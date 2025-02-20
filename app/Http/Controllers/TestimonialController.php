<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // Show list of all testimonials
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    // Show form to create a new testimonial
    public function create()
    {
        return view('dashboard.testimonials.create');
    }

    // Store a new testimonial
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'quote' => 'required|string|max:255',
        ]);

        Testimonial::create($request->all());

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully!');
    }

    // Show form to edit a testimonial
    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.edit', compact('testimonial'));
    }

    // Update an existing testimonial
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'company' => 'required',
            'quote' => 'required',
        ]);

        $testimonial->update($request->all());

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    // Delete a testimonial
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully!');
    }
}
