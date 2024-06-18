<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    
    </head>
    <body class="font-sans antialiased">
        @inertia

        
        <!-- Cursor follows the cross. -->
        <div class=""> 
            <div class="cross cursor-follow"></div>
        <div>

        
        <div>
            <body>
            </body>

        </div>
            
        <script>
            document.addEventListener('mousemove', function(e) {
                const cursorFollow = document.querySelector('.cursor-follow');
                cursorFollow.style.left = `${e.pageX}px`;
                cursorFollow.style.top = `${e.pageY}px`;
            });
        </script>
    
    </body>
</html>
