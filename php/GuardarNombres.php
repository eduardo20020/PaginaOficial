<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Parámetros POST:<br>";
    foreach ($_POST as $key => $value) {
        echo "$key: $value<br>";
    }
}
?>
