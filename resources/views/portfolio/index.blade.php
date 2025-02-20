@extends('layouts.portfolio')

@section('content')
<!-- Dynamically load the theme's CSS -->
<link rel="stylesheet" href="{{ asset($theme->css_path) }}">

<div class="background-image-container" style="background-image: url('{{ asset('storage/' . ($settings['background_image'] ?? 'default_background.jpg')) }}');">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#">Portfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#experience">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

    <div class="container text-center text-white header-overlay">
        <div class="portfolio-header">
            <h1 class="display-4 font-weight-bold animated fadeInDown">{{ $settings['title'] ?? 'Your Name' }}</h1>
            <p class="lead animated fadeInUp">{{ $settings['header'] ?? 'Professional Tagline' }}</p>
        </div>
    </div>
</div>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container">
        <h2 class="section-title text-center">About Me</h2>
        <div class="row align-items-center">
            <div class="col-md-6 text-md-left mb-4 mb-md-0">
                <img src="{{ asset('storage/' . ($settings['profile_picture'] ?? 'default.png')) }}" alt="Profile Picture" class="img-fluid rounded-circle shadow-lg">
            </div>
            <div class="col-md-6 text-center text-md-left">
                <p>{{ $settings['about_me'] ?? 'A brief introduction about yourself.' }}</p>
                <div class="social-icons mt-4">
                    @foreach(['facebook', 'twitter', 'linkedin', 'github', 'instagram', 'youtube'] as $social)
                        @if(($settings["{$social}_visibility"] ?? '0') == '1' && !empty($settings["{$social}_url"]))
                            <a href="{{ $settings["{$social}_url"] }}" class="btn btn-outline-light mx-2" target="_blank">
                                <i class="fab fa-{{ $social }}"></i>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center">Skills</h2>
        <div class="row text-center">
            @foreach($skills as $skill)
                <div class="col-md-3 mb-4">
                    <div class="card skill-card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $skill->name }}</h5>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $skill->percentage }}%;" aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $skill->percentage }}%</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Projects</h2>
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 project-card h-100">
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" class="card-img-top project-image" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                            <a href="{{ $project->url }}" class="btn btn-outline-primary btn-block" target="_blank">View Project</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center">Experience</h2>
        <ul class="list-group">
            @foreach($experiences as $experience)
                <li class="list-group-item">
                    <strong>{{ $experience->title }}</strong> at {{ $experience->company }}
                    <br>
                    <small class="text-muted">{{ $experience->start_date }} - {{ $experience->end_date ?? 'Present' }}</small>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Testimonials</h2>
        <div class="row">
            @foreach($testimonials as $testimony)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-lg border-0">
                        <blockquote class="blockquote card-body">
                            <p>"{{ $testimony->quote }}"</p>
                            <footer class="blockquote-footer">{{ $testimony->name }}, <cite>{{ $testimony->position }} at {{ $testimony->company }}</cite></footer>
                        </blockquote>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center">Contact Me</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 btn-block">Send Message</button>
                </form>
            </div>
        </div>

        @if(!empty($settings['resume']))
            <div class="text-center mt-4">
                <a href="{{ asset('storage/' . $settings['resume']) }}" class="btn btn-outline-primary" download>
                    <i class="fas fa-download"></i> Download My Resume
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Back to Top Button -->
<a href="#" id="back-to-top" class="btn btn-primary btn-lg back-to-top" role="button">
    <i class="fas fa-chevron-up"></i>
</a>

<!-- Footer -->
<footer class="footer text-center py-4">
    <p class="mb-0">{{ $settings['footer'] ?? '' }} <br>&copy; {{ date('Y') }} {{ $settings['title'] ?? '' }}. All rights reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Back to top button visibility
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });

        // Smooth scrolling to sections
        $('.nav-link').on('click', function(event) {
            event.preventDefault();
            var target = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(target).offset().top - 70
            }, 500);
        });
    });
</script>
@endsection
