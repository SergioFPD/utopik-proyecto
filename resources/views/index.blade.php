<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Resultados</h1>
    <p> El nombre es {{ $usuario->nombre}}</p>
    <p> Ciudad es {{ $usuario->Ciudad->ciudad}}</p>
    <p> rol es {{ $usuario->rol}}</p>
 <br>
    <p> El nombre es {{ $usuario2->nombre}}</p>
    <p> Ciudad es {{ $usuario2->Ciudad->ciudad}}</p>
    <p> rol es {{ $usuario2->rol}}</p>
</body>
</html>