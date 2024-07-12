<?php

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

echo "la erpuesta de tu peticion es: ". $data;

?>