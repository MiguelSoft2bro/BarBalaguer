<?php
header('Content-Type: text/css');

$directorioFuentes = '.'; // O puedes usar __DIR__ para referirte al directorio actual

$fuentes = scandir($directorioFuentes);

foreach ($fuentes as $fuente) {
    $info = pathinfo($fuente);
    $nombreArchivo = $info['filename'];
    $extension = $info['extension'];

    if (in_array($extension, ['woff', 'woff2', 'ttf', 'otf', 'eot'])) {
        $nombreFuente = preg_replace('/[-_]/', ' ', $nombreArchivo); // Reemplaza guiones y guiones bajos por espacios
        $nombreFuente = ucwords($nombreFuente); // Capitaliza cada palabra para hacerlo más presentable como nombre de fuente
        
        // Genera la regla @font-face
        echo "@font-face {\n";
        echo "    font-family: '$nombreFuente';\n";
        echo "    src: url('$fuente');\n";
        echo "}\n";
    }
}