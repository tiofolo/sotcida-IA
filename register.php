<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Implementar lógica para registrar el usuario en la base de datos
    if (registerUser($username, $password, $email)) {
        echo "Registro exitoso.";
    } else {
        echo "Error en el registro.";
    }
}

function registerUser($username, $password, $email) {
    // Función para guardar los datos del nuevo usuario en la base de datos
    return true;  // Simulación de registro exitoso
}
?>

