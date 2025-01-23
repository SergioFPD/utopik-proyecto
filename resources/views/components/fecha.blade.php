@php
    $languages = Config::get('languages');

    // Obtener el idioma actual
    $currentLang = App::getLocale();

    $date = new DateTime($fecha);
    // Establecer la localización en función del idioma
    switch ($currentLang) {
        case 'es':
            setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain');
            $fechaLarga = strftime('%A, %d de %B de %Y', $date->getTimestamp());
            break;
        case 'en':
            setlocale(LC_TIME, 'en_US.UTF-8', 'en_EN', 'English');
            $fechaLarga = strftime('%A, %B %d, %Y', $date->getTimestamp());
            break;
        default:
            setlocale(LC_TIME, 'en_US.UTF-8', 'en_EN', 'English');
            $fechaLarga = strftime('%A, %B %d, %Y', $date->getTimestamp());
    }

    echo $fechaLarga;
@endphp
