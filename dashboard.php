<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Dashboard de Usuario</h1>
        <nav>
            <a href="logout.php">Cerrar Sesión</a>
        </nav>
    </header>
    <main>
        <h2>Bienvenido, <?php echo $_SESSION['username']; ?></h2>
        <p>Desde aquí puedes gestionar tus bots, editar tus prompts y participar en juegos.</p>
    </main>
    <footer>
        <p>&copy; 2023 SotcidA$IA.es. Todos los derechos reservados.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>

