<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            try {
              if (localStorage.dark == 1 || (!('dark' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
                document.querySelector('meta[name="theme-color"]').setAttribute('content', '#0B1120')
              } else {
                document.documentElement.classList.remove('dark')
              }
            } catch (_) {}
          </script>
        <meta name="author" content="Manuel Echavarria">
        <title>{{ config('app.name', 'MaetDev') }}</title>
        <meta name="description" content="Calcula y gestiona de manera fácil tu índice académico."/>
        
        <link rel="shortcut icon" href="{{ asset('img/11.ico') }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- My Styles -->
        <link rel="stylesheet" href="{{ asset('css/my-style.css') }}">
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-white dark:bg-gray-900">
        <x-jet-banner />
        <div class="min-h-screen">
            @livewire('navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <x-footers.footer />
        @stack('modals')
        @livewireScripts
        <script src="{{ asset('js/generals_functions.js') }}"></script>
        <script src="{{ asset('vendor/sweetalert/sweetalert2.all.min.js') }}"></script>      
        @yield('scripts')
    </body>
</html>
