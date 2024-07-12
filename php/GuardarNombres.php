<?php
// Verifica si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Configuración de la conexión a la base de datos MySQL usando PDO
    $servername = "localhost"; // Cambia esto por tu servidor de base de datos
    $username = "eduardo"; // Cambia esto por tu nombre de usuario de MySQL
    $password = "<2002>"; // Cambia esto por tu contraseña de MySQL
    $dbname = "prueba11"; // Cambia esto por el nombre de tu base de datos

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Establece el modo de error PDO a excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepara la consulta para insertar datos
        $stmt = $conn->prepare("INSERT INTO usuario (nombre, contra) VALUES (:nombre, :contra)");

        // Bind de parámetros de la consulta
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':contra', $contra);

        // Asigna valores de POST a las variables
        $nombre = $_POST['nombre']; // Asegúrate de sanitizar y validar los datos antes de usarlos
        $contra = $_POST['password']; // Asegúrate de sanitizar y validar los datos antes de usarlos

        // Ejecuta la consulta
        $stmt->execute();

        echo "Datos insertados correctamente";
    } catch(PDOException $e) {
        echo "Error al insertar datos: " . $e->getMessage();
    }

    // Cierra la conexión a la base de datos
    $conn = null;
}
?>