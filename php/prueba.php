<?php
// Verifica si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el contenido JSON de la solicitud POST
    $json_data = file_get_contents('php://input');

    // Decodifica el JSON a un array asociativo
    $data = json_decode($json_data, true);

    // Verifica si se pudo decodificar correctamente el JSON
    if ($data !== null) {
        // Accede a los datos del JSON
        $nombre = $data['nombre'] ?? '';
        $contra = $data['contra'] ?? '';

        // Muestra los datos recibidos
        echo "Nombre recibido: " . $nombre . "<br>";
        echo "Contraseña recibida: " . $contra . "<br>";

        // Configuración de la conexión a la base de datos MySQL usando PDO
        $servername = "localhost"; // Cambia esto por tu servidor de base de datos
        $username = "eduardo"; // Cambia esto por tu nombre de usuario de MySQL
        $password = "<2002>"; // Cambia esto por tu contraseña de MySQL
        $dbname = "prueba11"; // Cambia esto por el nombre de tu base de datos

        try {
            // Crear una conexión PDO
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Establecer el modo de error de PDO a excepción
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Aquí puedes realizar operaciones con la base de datos, por ejemplo:
            // Insertar datos en una tabla
            $stmt = $conn->prepare("INSERT INTO usuario (nombre, contra) VALUES (:nombre, :contra)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':contra', $contra);
            $stmt->execute();

            echo "Datos insertados correctamente en la base de datos.";
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    } else {
        echo "Error al decodificar el JSON.";
    }
}
?>
