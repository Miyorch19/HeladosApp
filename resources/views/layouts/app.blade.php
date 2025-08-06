{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
        }
    </style>
    @stack('styles')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-stone-50 flex flex-col">
        @if(request()->routeIs(['home', 'heladeria.*', 'dashboard', 'admin.*']))
            {{-- Layout con sidebar para páginas de la heladería, dashboard y admin --}}
            <div class="flex-1">
                <x-sidebar>
                    @yield('content')
                </x-sidebar>
            </div>
            {{-- Footer solo para páginas de la heladería --}}
            @if(request()->routeIs(['home', 'heladeria.*']))
                <x-footer />
            @endif
        @else
            {{-- Layout sin sidebar para otras páginas (auth, etc.) --}}
            <div class="flex-1">
                @yield('content')
            </div>
        @endif
    </div>
    @stack('scripts')
</body>
</html>