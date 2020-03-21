<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ZEG</title>

        <!-- Fonts -->
        <link rel="icon" type="image/png" href="images/icons/zeg.png" sizes="32x32">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <link rel="stylesheet" href="animate.min.css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @auth
            <div class="alert alert-success red">
                Has iniciado session con el correo: {{session('email')}}
            </div>
        @endauth
        <div id="app"></div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
