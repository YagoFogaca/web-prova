<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Home</title>

</head>

<body>

    @include('components.navbar.index')

    <main class="container-platform">
        @yield('content')
    </main>
</body>

</html>
