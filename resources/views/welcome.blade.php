<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                height: 100vh;
            }

            .left-column,
            .right-column {
                width: 300px;
                padding: 20px;
                border-radius: 10px;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
            }

            .left-column {
                left: 0;
                margin-left: 10px; 
            }

            .right-column {
                right: 0;
                margin-right: 10px;
            }

            .cross {
                position: absolute;
                left: 0; 
                right: 0; 
                margin-left: auto; 
                margin-right: auto; 
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

        <!-- Cursor follows the cross. -->
        <div class=""> 
            <div class="cross cursor-follow"></div>
        <div>

        <div>
            <body>
                <div class="left-column">
                    <div>
                        <audio controls class="mt-4">
                        <source src="../prayers/prayer1.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div>
                        <audio controls class="mt-4">
                        <source src="../prayers/prayer2.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div>
                        <audio controls class="mt-4">
                        <source src="../prayers/prayer3.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>

                <div class="right-column">
                    <div>
                        <audio controls class="mt-4">
                        <source src="../prayers/prayer4.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div>
                        <audio controls class="mt-4">
                        <source src="../prayers/prayer5.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div>
                        <audio controls class="mt-4">
                        <source src="../prayers/prayer6.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>

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
