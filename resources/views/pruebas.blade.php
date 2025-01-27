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

    <?php
// Configuración de la API

$datos = "Viajar por el mundo es una experiencia enriquecedora que 
permite descubrir culturas, paisajes y tradiciones únicas. Desde explorar monumentos 
históricos hasta relajarse en playas paradisíacas, cada destino ofrece algo especial. 
Es una oportunidad para ampliar horizontes, conectar con personas de diversas culturas y 
crear recuerdos inolvidables. Los viajes transforman nuestra perspectiva y nos inspiran a
 valorar la belleza y diversidad del planeta.";

$url = "https://lingva.ml/api/v1/es/en/Viajar por el mundo es una experiencia"; // Traduce de Español a Inglés

// Realizar la solicitud GET con cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Decodificar la respuesta
$translation = json_decode($response, true);

// Mostrar el resultado
echo $translation['translation'];
?>



</body>

</html>
