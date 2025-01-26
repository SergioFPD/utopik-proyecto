<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>PAGINA DE PRUEBA</h1>
    <svg width="300" height="300" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
        <!-- Fondo circular -->
        <circle cx="150" cy="150" r="150" fill="#4CAF50" />
      
        <!-- Mapa del mundo: un círculo con un patrón simple -->
        <circle cx="150" cy="150" r="130" fill="lightblue" />
        
        <!-- Continentes como un patrón simplificado -->
        <circle cx="110" cy="100" r="20" fill="#8BC34A" />
        <circle cx="180" cy="90" r="25" fill="#8BC34A" />
        <circle cx="120" cy="160" r="20" fill="#8BC34A" />
        <circle cx="160" cy="170" r="30" fill="#8BC34A" />
        <circle cx="200" cy="120" r="15" fill="#8BC34A" />
        
        <!-- Animación de rotación continua -->
        <animateTransform 
          attributeName="transform" 
          type="rotate" 
          from="0 150 150" 
          to="360 150 150" 
          dur="20s" 
          repeatCount="indefinite" />
      </svg>
      
      
</body>
</html>