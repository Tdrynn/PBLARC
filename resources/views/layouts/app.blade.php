<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angklung River Camp</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/Logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <div class="container-fluid">
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>