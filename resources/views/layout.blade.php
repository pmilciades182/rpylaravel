<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Recetas Paraguayas')</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="theme-color" content="#106ebe">
</head>
<body>
    <nav class="fluent-nav">
        <div class="fluent-nav-container">
            <a class="fluent-nav-brand" href="{{ route('recetas.index') }}">
                <i class="fluent-icon fluent-icon-24 fluent-icon-recipe"></i>
                Recetas Paraguayas
            </a>
            <ul class="fluent-nav-menu">
                <li class="fluent-nav-item">
                    <a class="fluent-nav-link {{ request()->routeIs('recetas.index') ? 'active' : '' }}" href="{{ route('recetas.index') }}">
                        <i class="fluent-icon fluent-icon-16 fluent-icon-home"></i>
                        Inicio
                    </a>
                </li>
                <li class="fluent-nav-item">
                    <a class="fluent-nav-link {{ request()->routeIs('recetas.create') ? 'active' : '' }}" href="{{ route('recetas.create') }}">
                        <i class="fluent-icon fluent-icon-16 fluent-icon-add"></i>
                        Nueva Receta
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="fluent-container fluent-section">
        @if(session('success'))
            <div class="fluent-alert fluent-alert-success fluent-fade-in" role="alert">
                <i class="fluent-icon fluent-icon-16 fluent-icon-check fluent-icon-success"></i>
                <div class="fluent-alert-content">
                    <div class="fluent-alert-message">{{ session('success') }}</div>
                </div>
                <button type="button" class="fluent-alert-close" onclick="this.parentElement.style.display='none'">
                    <i class="fluent-icon fluent-icon-16 fluent-icon-close"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="fluent-alert fluent-alert-error fluent-fade-in" role="alert">
                <i class="fluent-icon fluent-icon-16 fluent-icon-error fluent-icon-error"></i>
                <div class="fluent-alert-content">
                    <div class="fluent-alert-message">{{ session('error') }}</div>
                </div>
                <button type="button" class="fluent-alert-close" onclick="this.parentElement.style.display='none'">
                    <i class="fluent-icon fluent-icon-16 fluent-icon-close"></i>
                </button>
            </div>
        @endif

        @yield('content')
    </div>

    <script>
        // Fluent Design System Theme Toggle
        function toggleTheme() {
            const body = document.body;
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('fluent-theme', newTheme);
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('fluent-theme') || 'light';
            document.body.setAttribute('data-theme', savedTheme);
        });

        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.fluent-alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 300);
                }, 5000);
            });
        });
    </script>
    @yield('scripts')
</body>
</html>