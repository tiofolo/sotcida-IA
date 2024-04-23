<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['promptTitle'];
    $content = $_POST['promptContent'];

    // Implementar lógica para guardar estos datos en una base de datos
    echo "Prompt guardado con éxito: " . htmlspecialchars($title);
}
?>

