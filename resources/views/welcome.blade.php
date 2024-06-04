<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            .cross {
                position: relative;
                width: 50px;
                height: 150px;
                background-color: hsl(195, 22%, 96%);
            }

            .cross::before {
                content: '';
                position: absolute;
                left: 50%;
                top: 35%;
                width: 150px;
                height: 50px;
                background-color: hsl(195, 22%, 96%);
                transform: translate(-50%, -50%);
            }

            .cursor-follow {
                position: absolute;
                pointer-events: none; 
            }
        </style>
    </head>

    <body>
                 
        <div> 
            <div class="cross cursor-follow"></div>
        <div>

        <img src="{{ Vite::asset('.resources/images/d.jpg') }}" alt="">
        
        <script>
            document.addEventListener('mousemove', function(e) {
            const cursorFollow = document.querySelector('.cursor-follow');
            cursorFollow.style.left = `${e.pageX}px`;
            cursorFollow.style.top = `${e.pageY}px`;
        });
        </script>
    
    </body>
</html>
