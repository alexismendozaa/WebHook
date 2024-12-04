<?php
// Configurar encabezados para permitir solicitudes de otros dominios (opcional, para pruebas locales)
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Leer el cuerpo de la solicitud
    $inputData = json_decode(file_get_contents('php://input'), true);

    // Verificar si se proporcionó el conjunto de números
    if (isset($inputData['numeros']) && is_array($inputData['numeros'])) {
        $numeros = $inputData['numeros'];

        // Validar que todos los elementos sean números
        if (count($numeros) > 0 && array_reduce($numeros, fn($carry, $item) => $carry && is_numeric($item), true)) {
            // Calcular el promedio
            $promedio = array_sum($numeros) / count($numeros);

            // Preparar la respuesta
            $response = array(
                'promedio' => round($promedio, 2),
                'numeros_recibidos' => $numeros
            );
        } else {
            $response = array('error' => 'Todos los elementos deben ser números.');
        }
    } else {
        $response = array('error' => 'Debe enviarse un array llamado "numeros".');
    }
} else {
    $response = array('error' => 'Solo se permiten solicitudes POST.');
}

// Enviar la respuesta en formato JSON
echo json_encode($response);
?>
