<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css" >
        <link rel="stylesheet" href="/assets/css/award.css" >

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->
        @livewireStyles

    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen ">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">

                </header>
            @endif

            <!-- Page Content -->
            <main>

@include('layouts.flash-message')
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="/assets/js/award.js"></script>
        @livewireScripts

        <script type="text/javascript">
            async function saveAudioToCache(audioUrl) {
                if ('caches' in window) {
                    try {
                        const cacheName = 'audio-cache';
                        const cache = await caches.open(cacheName);
                        const response = await fetch(audioUrl);
                        if (response.ok) {
                            await cache.put(audioUrl, response.clone());
                            console.log('Audio file cached successfully.');
                        } else {
                            console.error('Failed to fetch audio file:', response.statusText);
                        }
                    } catch (error) {
                        console.error('Error caching audio file:', error);
                    }
                } else {
                    console.error('Cache API is not supported in this browser.');
                }
            }



            document.getElementById('getready').addEventListener('click', async () => {

                const loading_btn=  document.querySelector('#loading_spinner');
                loading_btn.style.display = "block";

                for (i = 1; i < 76; i++){
                    try{
                        const audioUrl = '/assets/audio/chimes/'+i+'.ogg';
                        // Example usage
                        saveAudioToCache(audioUrl);
                    }catch (Exception){
                        console.error('exception');
                    }

                }

                loading_btn.style.display = "none";
            });
        </script>
    </body>
</html>
