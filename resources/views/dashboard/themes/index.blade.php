@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Themes</h1>
    <a href="{{ route('themes.create') }}" class="btn btn-primary mb-4">Add New Theme</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($themes as $theme)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm theme-card" style="transition: all 0.3s ease;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $theme->name }}</h5>
                        <p class="card-text text-muted">CSS Path: {{ $theme->css_path }}</p>

                        <!-- Preview Box -->
                        <div class="theme-preview-box mb-3">
                            <iframe src="{{ route('themes.preview', $theme) }}" class="theme-preview-iframe"></iframe>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="{{ route('themes.edit', $theme) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('themes.destroy', $theme) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                        <form action="{{ route('themes.setActive') }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                            <button type="submit" class="btn btn-info btn-sm">
                                <i class="fas fa-check"></i> Set Active
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $themes->links('pagination::bootstrap-4') }}
    </div>
</div>

<style>
    /* Card hover effect with shadow and background change */
    .theme-card:hover {
        background-color: #f8f9fa;
        transform: translateY(-10px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    /* Preview box styling */
    .theme-preview-box {
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        height: 500px; /* Adjust height as needed */
    }

    /* iframe for theme preview */
    .theme-preview-iframe {
        width: 100%;
        height: 100%;
        border: 2px solid #ccc;
    }

    /* Card title styling */
    .card-title {
        font-weight: bold;
        color: #343a40;
    }

    /* Customize card footer */
    .card-footer {
        background-color: #ffffff;
        border-top: none;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    /* Button hover effect for interactivity */
    .btn-warning:hover, .btn-danger:hover, .btn-info:hover {
        opacity: 0.9;
    }

    /* Pagination customization */
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }
    .pagination .page-item .page-link {
        color: #007bff;
        transition: background-color 0.3s ease;
    }
    .pagination .page-item .page-link:hover {
        background-color: #f0f0f0;
    }
</style>

<!-- Add Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
