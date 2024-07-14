<?php
// Verificar si la solicitud es un POST y si tiene datos
    // Recibir el cuerpo de la solicitud JSON
    $json_data = file_get_contents('php://input');

    // Intentar decodificar el JSON recibido
    $data = json_decode($json_data, true);

    // Verificar si el JSON se decodificó correctamente
    if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400); // Bad Request
        echo json_encode(array('error' => 'Error al decodificar el JSON.'));
        exit;
    }

    // Aquí puedes procesar los datos recibidos
    // Por ejemplo, imprimir o manipular los datos recibidos
    echo "Datos recibidos:\n";
    print_r($data);

    // Puedes acceder a datos específicos como $data['campo']
    // Por ejemplo:
    // $nombre = $data['nombre'];
    // $password = $data['password'];

    // Responder con una confirmación o resultado
    echo "Solicitud procesada correctamente.";

?>
