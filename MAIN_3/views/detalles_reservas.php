<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "agencia_db");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar que el usuario esté autenticado
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login_form.php");
    exit;
}

$email = $_SESSION['username'];

// Obtener detalles de las reservas del usuario
$sql = "SELECT r.*, d.city, d.pais FROM reservas r JOIN destinos d ON r.id_viaje = d.id WHERE r.email = '$email'";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de sus Reservas - Agencia de Viajes</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <div class="header">
        <div class="left">Detalles de sus Reservas</div>
        <div class="right">
            <?php
            if (isset($_SESSION['username'])) {
                echo "Usuario: " . htmlspecialchars($_SESSION['username']);
                echo "<a href='logout.php'>Cerrar sesión</a>";
            } else {
                echo "<a href='login_form.php' style='color: white;'>Iniciar Sesión</a>";
            }
            ?>
        </div>
    </div>
    <div class="nav">
        <a href="../index.php">Inicio</a>
        <a href="catalogo_viajes.php">Catálogo de Viajes</a>
        <a href="detalles_reservas.php">Reservas</a>
        <a href="administracion.php">Administración</a>
        <a href="contacto.php">Soporte y Contacto</a>
    </div>
    <div class="main-content">
        <h1>Detalles de sus Reservas</h1>
        <div class="contenido-blanco">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='reserva'>";
                    echo "<h2>" . $row['city'] . ", " . $row['pais'] . "</h2>";
                    echo "<p>Email: " . $row['email'] . "</p>";
                    echo "<p>Niños: " . $row['cantidad_ninos'] . "</p>";
                    echo "<p>Adultos: " . $row['cantidad_adultos'] . "</p>";
                    echo "<p>Mayores: " . $row['cantidad_mayores'] . "</p>";
                    echo "<p>Precio Total: $" . $row['precio_total'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay reservas.</p>";
            }
            ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Agencia de Viajes. Todos los derechos reservados.</p>
    </div>
</body>
</html>



