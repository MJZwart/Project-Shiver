<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Shiver') }}</title>

        <!-- Styles / Scripts -->
        @production
            @php
                $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
            @endphp
            @foreach($manifest['src/main.ts']['css'] as $url)
                <link rel="stylesheet" href="/build/{{ $url }}" type="text/css" />
            @endforeach
        @endproduction
    </head>
    <body>
    <div id="app"></div>
        @production
        <script type="module" src="/build/{{ $manifest['src/main.ts']['file'] }}" type="text/html"></script>
        @else
        <script type="module" src="http://localhost:5173/@@vite/client"></script>
        <script type="module" src="http://localhost:5173/src/main.ts"></script>
        @endproduction
    </body>
</html>
