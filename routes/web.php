<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SettingsController;

// Authentication routes
Auth::routes(['register' => false]); // Disable registration

// Portfolio routes (accessible to everyone)
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');

// Dashboard for admin (authenticated user only)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.index');

    // Admin CRUD routes
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('experiences', ExperienceController::class);

    // Theme routes
    Route::resource('themes', ThemeController::class);
    Route::post('themes/set-active', [ThemeController::class, 'setActive'])->name('themes.setActive');
    Route::get('themes/{theme}/preview', [ThemeController::class, 'preview'])->name('themes.preview');

    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');


    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('/settings/update-title', [SettingsController::class, 'updateTitle'])->name('settings.updateTitle');
Route::post('/settings/update-header', [SettingsController::class, 'updateHeader'])->name('settings.updateHeader');
Route::post('/settings/update-footer', [SettingsController::class, 'updateFooter'])->name('settings.updateFooter');
Route::post('/settings/update-about-me', [SettingsController::class, 'updateAboutMe'])->name('settings.updateAboutMe');
Route::post('/settings/update-profile-picture', [SettingsController::class, 'updateProfilePicture'])->name('settings.updateProfilePicture');

//social links edit
Route::post('/settings/update-facebook-url', [SettingsController::class, 'updateFacebookUrl'])->name('settings.updateFacebookUrl');
Route::post('/settings/update-twitter-url', [SettingsController::class, 'updateTwitterUrl'])->name('settings.updateTwitterUrl');
Route::post('/settings/update-linkedin-url', [SettingsController::class, 'updateLinkedInUrl'])->name('settings.updateLinkedInUrl');
Route::post('/settings/update-github-url', [SettingsController::class, 'updateGitHubUrl'])->name('settings.updateGitHubUrl');
Route::post('/settings/update-instagram-url', [SettingsController::class, 'updateInstagramUrl'])->name('settings.updateInstagramUrl');
Route::post('/settings/update-youtube-url', [SettingsController::class, 'updateYouTubeUrl'])->name('settings.updateYouTubeUrl');

// route for uploading resume
Route::post('/settings/update-resume', [SettingsController::class, 'updateResume'])->name('settings.updateResume');

//background image edit route 
Route::post('/settings/background_image', [SettingsController::class, 'updateBackgroundImage'])->name('settings.updateBackgroundImage');

});

// Contact submission route (accessible to everyone)
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');


