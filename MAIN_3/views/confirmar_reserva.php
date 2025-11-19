<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "agencia_db");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar que los datos estén definidos en POST
if (!isset($_POST['id_viaje'], $_POST['email'], $_POST['cantidad_ninos'], $_POST['cantidad_adultos'], $_POST['cantidad_mayores'])) {
    die("Datos incompletos para la reserva.");
}

$id_viaje = $_POST['id_viaje'];
$email = $_POST['email'];
$cantidad_ninos = $_POST['cantidad_ninos'];
$cantidad_adultos = $_POST['cantidad_adultos'];
$cantidad_mayores = $_POST['cantidad_mayores'];

// Obtener detalles del destino seleccionado
$sql = "SELECT * FROM destinos WHERE id = $id_viaje";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $destino = $result->fetch_assoc();
} else {
    die("Destino no encontrado.");
}

// Calcular el precio total
$precio_total = ($cantidad_ninos * $destino['precio_nino']) + ($cantidad_adultos * $destino['precio_adulto']) + ($cantidad_mayores * $destino['precio_mayor']);

// Guardar detalles de la reserva en la base de datos
$sql_reserva = "INSERT INTO reservas (id_viaje, email, cantidad_ninos, cantidad_adultos, cantidad_mayores, precio_total) VALUES ('$id_viaje', '$email', '$cantidad_ninos', '$cantidad_adultos', '$cantidad_mayores', '$precio_total')";
if ($conn->query($sql_reserva) === TRUE) {
    echo "Reserva confirmada correctamente.";
} else {
    echo "Error al confirmar la reserva: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Reserva - Agencia de Viajes</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <div class="header">
        <div class="left">Confirmar Reserva</div>
        <div class="right">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "Usuario: " . htmlspecialchars($_SESSION['username']);
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
        <h1>Confirmar Reserva para <?php echo htmlspecialchars($destino['city']); ?></h1>
        <div class="detalle-reserva">
            <p>Reserva confirmada para <?php echo htmlspecialchars($email); ?></p>
            <p>Precio Total: $<?php echo $precio_total; ?></p>
            <a href="detalles_reservas.php">Ver mis reservas</a>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Agencia de Viajes. Todos los derechos reservados.</p>
    </div>
</body>
</html>



