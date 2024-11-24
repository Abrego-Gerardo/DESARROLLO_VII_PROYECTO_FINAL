<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "agencia_db");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Variables de filtro
$origen = isset($_POST['origen']) ? $_POST['origen'] : '';
$destino = isset($_POST['destino']) ? $_POST['destino'] : '';
$fecha_salida = isset($_POST['fecha_salida']) ? $_POST['fecha_salida'] : '';
$fecha_regreso = isset($_POST['fecha_regreso']) ? $_POST['fecha_regreso'] : '';
$tipo_viaje = isset($_POST['tipo_viaje']) ? $_POST['tipo_viaje'] : '';
$precio = isset($_POST['precio']) ? $_POST['precio'] : 1000;

// Consulta con los filtros seleccionados
$sql = "SELECT * FROM destinos WHERE tipo_destino LIKE ? AND city LIKE ? AND tipo_viaje LIKE ? AND precio <= ?";
$stmt = $conn->prepare($sql);
$origen_wildcard = "%$origen%";
$destino_wildcard = "%$destino%";
$tipo_viaje_wildcard = "%$tipo_viaje%";
$stmt->bind_param("sssi", $origen_wildcard, $destino_wildcard, $tipo_viaje_wildcard, $precio);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda - Agencia de Viajes</title>
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <div class="header">
        <div class="left">Resultados de Búsqueda</div>
        <div class="right">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "Usuario: " . htmlspecialchars($_SESSION['username']);
            } else {
                echo "<a href='views/login_form.php' style='color: white;'>Iniciar Sesión</a>";
            }
            ?>
        </div>
    </div>
    <div class="nav">
        <a href="index.php">Inicio</a>
        <a href="views/catalogo_viajes.php">Catálogo de Viajes</a>
        <a href="views/detalles_reservas.php">Reservas</a>
        <a href="views/administracion.php">Administración</a>
        <a href="views/contacto.php">Soporte y Contacto</a>
    </div>
    <div class="main-content">
        <h1>Resultados de tu búsqueda</h1>
        <div class="destinos">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<form action='views/detalles_viaje.php' method='get'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='destino' style='background-image: url(" . $row['foto'] . ");'>";
                    echo "<h3>" . $row['city'] . "</h3>";
                    echo "<p>Precio: $" . $row['precio'] . "</p>";
                    echo "<p>Tipo de Viaje: " . $row['tipo_viaje'] . "</p>";
                    echo "</button>";
                    echo "</form>";
                }
            } else {
                echo "<p>No se encontraron resultados que coincidan con tu búsqueda.</p>";
            }
            ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Agencia de Viajes. Todos los derechos reservados.</p>
    </div>
</body>
</html>
