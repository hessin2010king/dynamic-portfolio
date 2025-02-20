<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings['title'] ?? config('app.name', 'Portfolio') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @php
    $activeThemeId = session('active_theme'); // Fetch the active theme ID from session
    $activeTheme = \App\Models\Theme::find($activeThemeId); // Get the active theme details
    @endphp

    @if ($activeTheme)
        <link rel="stylesheet" href="{{ asset('css/themes/' . $activeTheme->css_path) }}">
    @endif

    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            background-color: #343a40;
            color: #ffffff;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: 0;
        }

        .sidebar .nav-item {
            background-color: #343a40;
            border: none;
        }

        .sidebar .nav-link {
            color: #ffffff;
            text-decoration: none;
            font-size: 1rem;
            padding-left: 1rem;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        /* Button for toggling sidebar */
        .toggle-btn {
            font-size: 1.5rem;
            cursor: pointer;
            color: #000000;
            position: fixed; /* Keep it visible even when sidebar is collapsed */
            top: 10px;
            left: 260px; /* Position the button just next to the sidebar */
            z-index: 105; /* Ensure it stays on top */
            transition: left 0.3s ease; /* Smooth transition when sidebar collapses */
        }

        .toggle-btn.collapsed {
            left: 10px; /* Adjust button position when sidebar is collapsed */
        }

        .content {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
            padding: 20px;
        }

        .content.collapsed {
            margin-left: 80px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100px;
            }

            .content {
                margin-left: 100px;
            }

            .sidebar.collapsed {
                width: 60px;
            }

            .content.collapsed {
                margin-left: 60px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar.collapsed {
                width: 100%;
            }

            .content {
                margin-left: 0;
            }

            .content.collapsed {
                margin-left: 0;
            }

            .toggle-btn.collapsed {
                left: 10px;
            }
        }
    </style>
</head>
<body class="m-0">
    <div id="app">
        @auth
            <div class="sidebar" id="sidebar">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h5 class="text-white">Admin Dashboard</h5>
                </div>
                <ul class="nav nav-pills nav-sidebar flex-column w-100" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('portfolio') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('settings.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('projects.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <span>Projects Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('skills.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <span>Skills Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('testimonials.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <span>Testimonials Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('experiences.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <span>Experiences Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('themes.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-palette"></i>
                            <span>Themes Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact.index') }}" class="nav-link">
                            <i class="nav-icon  fas fa-inbox"></i>
                            <span>Contact Mails</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
        <div class="content @auth mt-4 @endauth" id="mainContent">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <!-- Toggle button (outside sidebar) -->
        <span class="toggle-btn" id="toggleBtn" onclick="toggleSidebar()">&#x1F5B1;</span>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('mainContent');
            const toggleBtn = document.getElementById('toggleBtn');

            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
            toggleBtn.classList.toggle('collapsed');
        }
    </script>
</body>
</html>
