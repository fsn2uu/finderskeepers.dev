<!DOCTYPE html>
<html lang="en" style="background-image: url({{ asset('assets/background.jpeg') }})" class="bg-cover bg-fixed bg-no-repeat bg-center">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Finders Keepers</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}?v=1.0.2">
    </head>
    <body>
        @include('_nav')

        @yield('content')

        <script src="{{ mix('js/app.js') }}" defer></script>
        @stack('scripts')
    </body>
</html>