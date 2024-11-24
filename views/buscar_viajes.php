<?php
// Iniciar sesión y conexión a la base de datos
session_start();
$conn = new mysqli("localhost", "root", "", "agencia_db");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los filtros enviados desde el formulario
$tipo_destino = $_POST['destino'];
$tipo_viaje = $_POST['tipo_viaje']; // Nuevo parámetro
$fecha_salida = $_POST['fecha_salida']; // Nuevo parámetro
$fecha_retorno = $_POST['fecha_retorno']; // Nuevo parámetro
$precio_max = $_POST['precio'];

// Filtrar destinos según los criterios
$sql = "SELECT * FROM destinos WHERE tipo_destino = ? AND tipo_viaje = ? AND fecha_salida >= ? AND fecha_retorno <= ? AND 
        CAST(precio_nino AS UNSIGNED) <= ? AND 
        CAST(precio_adulto AS UNSIGNED) <= ? AND 
        CAST(precio_mayor AS UNSIGNED) <= ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssii", $tipo_destino, $tipo_viaje, $fecha_salida, $fecha_retorno, $precio_max, $precio_max, $precio_max);
$stmt->execute();
$result = $stmt->get_result();

// Cerrar conexión al finalizar
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <div class="header">
        <div class="left">Resultados de Búsqueda</div>
        <div class="right">
            <?php
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
        <h1>Paquetes Disponibles</h1>
        <div class="destinos-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<form action='detalles_viaje.php' method='get'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='destino' style='background-image: url(" . $row['foto'] . ");'>";
                    echo "<h3>" . htmlspecialchars($row['city']) . "</h3>";
                    echo "<p>Precios: Niño $" . $row['precio_nino'] . ", Adulto $" . $row['precio_adulto'] . ", Mayor $" . $row['precio_mayor'] . "</p>";
                    echo "</button>";
                    echo "</form>";
                }
            } else {
                echo "<p>No se encontraron paquetes con los filtros seleccionados.</p>";
            }
            ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Agencia de Viajes. Todos los derechos reservados.</p>
    </div>
</body>
</html>