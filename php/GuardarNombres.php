<?php

$json = file_get_contents('php://input');

$data = json_decode($json,true);

if($data===null){
    http_response_code(400);
    echo json_encode(['error' => 'JSON inválido']);
    exit;
}

$nombre = $data['Nombre'];

$password = $data['Contra'];


echo "Tu nombre es: ". $nombre . " y tu contra es: puchaina";
?>
