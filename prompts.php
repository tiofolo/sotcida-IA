<?php
// Inicio de sesión o manejo de la sesión si es necesario
session_start();

// Verificar que el método de solicitud es POST para procesar los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asegurarse de que los campos necesarios están presentes y no están vacíos
    if (isset($_POST['promptTitle'], $_POST['promptContent']) && !empty($_POST['promptTitle']) && !empty($_POST['promptContent'])) {
        // Escapar y limpiar los datos para evitar inyecciones XSS
        $title = htmlspecialchars($_POST['promptTitle']);
        $content = htmlspecialchars($_POST['promptContent']);

        // Aquí iría la lógica para guardar estos datos en una base de datos
        // Se recomienda el uso de sentencias preparadas para evitar inyecciones SQL
        try {
            // Configuración de la conexión a la base de datos
            $db = new PDO('mysql:host=localhost;dbname=tu_base_de_datos;charset=utf8', 'username', 'password');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Preparar la sentencia SQL para insertar los datos
            $stmt = $db->prepare("INSERT INTO prompts (title, content) VALUES (:title, :content)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);

            // Ejecutar la sentencia
            $stmt->execute();

            echo "Prompt guardado con éxito: " . $title;
        } catch (PDOException $e) {
            // Manejar el error (puede ser logueado en un sistema de producción)
            echo "Error al guardar el prompt: " . $e->getMessage();
        }
    } else {
        // Informar al usuario que los datos del formulario son necesarios
        echo "Todos los campos son obligatorios.";
    }
} else {
    // No es una petición POST
    echo "Método no permitido.";
}
?>
