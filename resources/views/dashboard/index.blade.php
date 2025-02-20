@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Project Widget -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Projects</h5>
                    <p class="card-text">{{ $projectCount }} Projects</p>
                </div>
            </div>
        </div>

        <!-- Skills Widget -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Skills</h5>
                    <p class="card-text">{{ $skillCount }} Skills</p>
                </div>
            </div>
        </div>

        <!-- Testimonials Widget -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Testimonials</h5>
                    <p class="card-text">{{ $testimonialCount }} Testimonials</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Experiences Widget -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Experiences</h5>
                    <p class="card-text">{{ $experienceCount }} Experiences</p>
                </div>
            </div>
        </div>

        <!-- Themes Widget -->
        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Themes</h5>
                    <p class="card-text">{{ $themeCount }} Themes</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
