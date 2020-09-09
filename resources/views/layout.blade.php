<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link href="{{ mix('css/main.css') }}" rel="stylesheet" />
    </head>

    <body>
        <main id="app">
            @yield('content')
        </main>

        <script src="{{ mix('js/main.js') }}"></script>
    </body>
</html>
