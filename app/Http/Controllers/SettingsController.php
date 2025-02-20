<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting; // Ensure to import the Setting model
use Illuminate\Support\Facades\Storage; // Import Storage for file handling

class SettingsController extends Controller
{
    public function index()
    {
        // Fetch settings from the database
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        
        // Add a fallback for 'resume' if not present
        if (!isset($settings['resume'])) {
            $settings['resume'] = null;  // Or a default value like '' if preferred
        }

        return view('settings.index', compact('settings'));
    }

    // Updating title, header, footer
    public function updateTitle(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);
        $this->updateConfig('title', $request->title);
        return redirect()->route('settings.index')->with('success', 'Title updated successfully.');
    }

    public function updateHeader(Request $request)
    {
        $request->validate(['header' => 'required|string|max:255']);
        $this->updateConfig('header', $request->header);
        return redirect()->route('settings.index')->with('success', 'Header updated successfully.');
    }

    public function updateFooter(Request $request)
    {
        $request->validate(['footer' => 'required|string|max:255']);
        $this->updateConfig('footer', $request->footer);
        return redirect()->route('settings.index')->with('success', 'Footer updated successfully.');
    }

    // Updating About Me
    public function updateAboutMe(Request $request)
    {
        $request->validate(['about_me' => 'required|string|max:1000']);
        $this->updateConfig('about_me', $request->about_me);
        return redirect()->route('settings.index')->with('success', 'About Me updated successfully.');
    }

    // Updating Profile Picture
    public function updateProfilePicture(Request $request)
    {
        $request->validate(['profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
        
        // Store the uploaded file
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $this->updateConfig('profile_picture', $path);
        }

        return redirect()->route('settings.index')->with('success', 'Profile picture updated successfully.');
    }

    // Updating Social Media Links with Visibility
    public function updateFacebookUrl(Request $request)
    {
        $request->validate([
            'facebook_url' => 'nullable|url|max:255',
            'facebook_visibile' => 'nullable|boolean'
        ]);
        
        $this->updateConfig('facebook_url', $request->facebook_url);
        $this->updateConfig('facebook_visibility', $request->facebook_visibility ? '1' : '0');
        
        return redirect()->route('settings.index')->with('success', 'Facebook updated successfully.');
    }

    public function updateTwitterUrl(Request $request)
    {
        $request->validate([
            'twitter_url' => 'nullable|url|max:255',
            'twitter_visibile' => 'nullable|boolean'
        ]);
        
        $this->updateConfig('twitter_url', $request->twitter_url);
        $this->updateConfig('twitter_visibility', $request->twitter_visibility ? '1' : '0');
        
        return redirect()->route('settings.index')->with('success', 'Twitter updated successfully.');
    }

    public function updateLinkedInUrl(Request $request)
    {
        $request->validate([
            'linkedin_url' => 'nullable|url|max:255',
            'linkedin_visible' => 'nullable|boolean'
        ]);

        $this->updateConfig('linkedin_url', $request->linkedin_url);
        $this->updateConfig('linkedin_visibility', $request->linkedin_visibility ? '1' : '0');
        
        return redirect()->route('settings.index')->with('success', 'LinkedIn updated successfully.');
    }

    public function updateGitHubUrl(Request $request)
    {
        $request->validate([
            'github_url' => 'nullable|url|max:255',
            'github_visibile' => 'nullable|boolean'
        ]);
        
        $this->updateConfig('github_url', $request->github_url);
        $this->updateConfig('github_visibility', $request->github_visibility ? '1' : '0');
        
        return redirect()->route('settings.index')->with('success', 'GitHub updated successfully.');
    }

    public function updateInstagramUrl(Request $request)
    {
        $request->validate([
            'instagram_url' => 'nullable|url|max:255',
            'instagram_visibile' => 'nullable|boolean'
        ]);

        $this->updateConfig('instagram_url', $request->instagram_url);
        $this->updateConfig('instagram_visibility', $request->instagram_visibility ? '1' : '0');
        
        return redirect()->route('settings.index')->with('success', 'Instagram updated successfully.');
    }

    public function updateYouTubeUrl(Request $request)
    {
        $request->validate([
            'youtube_url' => 'nullable|url|max:255',
            'youtube_visibile' => 'nullable|boolean'
        ]);

        $this->updateConfig('youtube_url', $request->youtube_url);
        $this->updateConfig('youtube_visibility', $request->youtube_visibility ? '1' : '0');
        
        return redirect()->route('settings.index')->with('success', 'YouTube updated successfully.');
    }

    // Updating Resume
    public function updateResume(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf|max:2048', // Ensure the file is a PDF and max size is 2MB
        ]);

        // Store the uploaded resume
        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $this->updateConfig('resume', $path);
        }

        return redirect()->route('settings.index')->with('success', 'Resume updated successfully.');
    }

    public function updateBackgroundImage(Request $request)
{
    $request->validate([
        'background_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Ensure max size is 2MB
    ]);
    
    // Store the uploaded file
    if ($request->hasFile('background_image')) {
        $path = $request->file('background_image')->store('backgrounds', 'public');
        $this->updateConfig('background_image', $path);
    }
    

    return redirect()->route('settings.index')->with('success', 'Background image updated successfully.');
}
    // Helper method to update settings
    private function updateConfig($key, $value)
    {
        // Update or create the setting in the database
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
