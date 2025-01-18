<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    {{-- Menu de navegación --}}
    @include('_components.menu')

    <div style="background-color: rgb(78, 219, 97)">
        <h1>CUERPO DE APP</h1>
        {{-- Contendio del cuerpo --}}
        @yield('content')
    </div>

</body>

</html>
