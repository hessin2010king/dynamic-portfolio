@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Website Settings</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul class="nav nav-tabs" id="settingsTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="title-tab" data-bs-toggle="tab" href="#title" role="tab">Edit Title</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="header-tab" data-bs-toggle="tab" href="#header" role="tab">Edit Header</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="footer-tab" data-bs-toggle="tab" href="#footer" role="tab">Edit Footer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="about-tab" data-bs-toggle="tab" href="#about" role="tab">Edit About Me</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab">Edit Profile Picture</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="social-tab" data-bs-toggle="tab" href="#social" role="tab">Edit Social Links</a>
        </li>
        <!-- Resume Tab -->
        <li class="nav-item">
            <a class="nav-link" id="resume-tab" data-bs-toggle="tab" href="#resume" role="tab">Edit Resume</a>
        </li>
        <!-- Background Image Tab -->
        <li class="nav-item">
            <a class="nav-link" id="background-tab" data-bs-toggle="tab" href="#background_image" role="tab">Edit Background Image</a>
        </li>
    </ul>

    <div class="tab-content mt-4" id="settingsTabContent">
        <!-- Title Tab -->
        <div class="tab-pane fade show active" id="title" role="tabpanel">
            <form action="{{ route('settings.updateTitle') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Website Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $settings['title'] ?? '' }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Title</button>
            </form>
        </div>

        <!-- Header Tab -->
        <div class="tab-pane fade" id="header" role="tabpanel">
            <form action="{{ route('settings.updateHeader') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="header">Website Header</label>
                    <input type="text" name="header" id="header" class="form-control" value="{{ $settings['header'] ?? '' }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Header</button>
            </form>
        </div>

        <!-- Footer Tab -->
        <div class="tab-pane fade" id="footer" role="tabpanel">
            <form action="{{ route('settings.updateFooter') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="footer">Website Footer</label>
                    <input type="text" name="footer" id="footer" class="form-control" value="{{ $settings['footer'] ?? '' }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Footer</button>
            </form>
        </div>

        <!-- About Me Tab -->
        <div class="tab-pane fade" id="about" role="tabpanel">
            <form action="{{ route('settings.updateAboutMe') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="about_me">About Me</label>
                    <textarea name="about_me" id="about_me" class="form-control" rows="5" required>{{ $settings['about_me'] ?? '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update About Me</button>
            </form>
        </div>

        <!-- Profile Picture Tab -->
        <div class="tab-pane fade" id="profile" role="tabpanel">
            <form action="{{ route('settings.updateProfilePicture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept="image/*" required>
                    <img src="{{ asset('storage/' . ($settings['profile_picture'] ?? '')) }}" alt="Profile Picture" class="img-fluid mt-2" style="max-width: 200px;">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Profile Picture</button>
            </form>
        </div>
        
        <!-- Social Links Tab -->
        {{-- <div class="tab-pane fade" id="social" role="tabpanel"> --}}
            <!-- Social Media Links -->
        <div class="mt-4 tab-pane fade" id="social" role="tabpanel">
            <h4 class="font-weight-bold">Social Media Links:</h4>
            
            <!-- Facebook -->
            <form action="{{ route('settings.updateFacebookUrl') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="facebook_url">Facebook URL</label>
                    <input type="url" class="form-control" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}">
                    
                </div>
                <div class="form-check">
                    <input type="checkbox" name="facebook_visibility" class="form-check-input" {{ ($settings['facebook_visibility'] ?? '0') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="facebook_visibility">Show Facebook</label>
                </div>
                <button type="submit" class="btn btn-primary">Update Facebook URL</button>
            </form>

            <!-- Twitter -->
            <form action="{{ route('settings.updateTwitterUrl') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="twitter_url">Twitter URL</label>
                    <input type="url" class="form-control" name="twitter_url" value="{{ $settings['twitter_url'] ?? '' }}">
                </div>
                <div class="form-check">
                    <input type="checkbox" name="twitter_visibility" class="form-check-input" {{ ($settings['twitter_visibility'] ?? '0') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="twitter_visibility">Show Twitter</label>
                </div>
                <button type="submit" class="btn btn-primary">Update Twitter URL</button>
            </form>

            <!-- LinkedIn -->
            <form action="{{ route('settings.updateLinkedInUrl') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="linkedin_url">LinkedIn URL</label>
                    <input type="url" class="form-control" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}">
                </div>
                <div class="form-check">
                    <input type="checkbox" name="linkedin_visibility" class="form-check-input" {{ ($settings['linkedin_visibility'] ?? '0') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="linkedin_visibility">Show LinkedIn</label>
                </div>
                <button type="submit" class="btn btn-primary">Update LinkedIn URL</button>
            </form>

            <!-- GitHub -->
            <form action="{{ route('settings.updateGitHubUrl') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="github_url">GitHub URL</label>
                    <input type="url" class="form-control" name="github_url" value="{{ $settings['github_url'] ?? '' }}">
                </div>
                <div class="form-check">
                    <input type="checkbox" name="github_visibility" class="form-check-input" {{ ($settings['github_visibility'] ?? '0') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="github_visibility">Show GitHub</label>
                </div>
                <button type="submit" class="btn btn-primary">Update GitHub URL</button>
            </form>

            <!-- Instagram -->
            <form action="{{ route('settings.updateInstagramUrl') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="instagram_url">Instagram URL</label>
                    <input type="url" class="form-control" name="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}">
                </div>
                <div class="form-check">
                    <input type="checkbox" name="instagram_visibility" class="form-check-input" {{ ($settings['instagram_visibility'] ?? '0') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="instagram_visibility">Show Instagram</label>
                </div>
                <button type="submit" class="btn btn-primary">Update Instagram URL</button>
            </form>

            <!-- YouTube -->
            <form action="{{ route('settings.updateYouTubeUrl') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="youtube_url">YouTube URL</label>
                    <input type="url" class="form-control" name="youtube_url" value="{{ $settings['youtube_url'] ?? '' }}">
                </div>
                <div class="form-check">
                    <input type="checkbox" name="youtube_visibility" class="form-check-input" {{ ($settings['youtube_visibility'] ?? '0') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="youtube_visibility">Show Youtube</label>
                </div>
                <button type="submit" class="btn btn-primary">Update YouTube URL</button>
            </form>
        </div>
    
        <!-- Resume Upload -->
        <div class="tab-pane fade" id="resume" role="tabpanel">

            <form action="{{ route('settings.updateResume') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="resume">Upload Resume (PDF)</label>
                    <input type="file" name="resume" id="resume" class="form-control" accept="application/pdf">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Resume</button>
            </form>
        </div>
        <!-- background -->
        <div class="tab-pane fade" id="background_image" role="tabpanel">
            <form action="{{ route('settings.updateBackgroundImage') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="background_image">Upload Background Image</label>
                    <input type="file" name="background_image" id="background_image" class="form-control" accept="image/*">
                </div>
                <img src="{{ asset('storage/' . ($settings['background_image'] ?? '')) }}" alt="Background Image" class="img-fluid mt-2" style="max-width: 200px;">
                <button type="submit" class="btn btn-primary mt-3">Update Background Image</button>
            </form>
        
        </div>
            
        </div>
        
    </div>
</div>


<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

@endsection
