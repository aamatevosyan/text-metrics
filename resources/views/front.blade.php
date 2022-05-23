<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://kit.fontawesome.com/ac32890ca4.js" crossorigin="anonymous"></script>

    @routes('front')
    @vite('front')
</head>
<body class="font-sans antialiased">
@inertia
</body>
</html>
