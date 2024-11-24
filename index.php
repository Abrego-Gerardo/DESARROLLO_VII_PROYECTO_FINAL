<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "agencia_db");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultas para obtener destinos nacionales e internacionales
$sql_nacionales = "SELECT * FROM destinos WHERE tipo_destino='Nacional'";
$result_nacionales = $conn->query($sql_nacionales);

$sql_internacionales = "SELECT * FROM destinos WHERE tipo_destino='Internacional'";
$result_internacionales = $conn->query($sql_internacionales);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Agencia de Viajes</title>
    <link rel="stylesheet" href="public/assets/css/style.css">
    <style>
        .destinos-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .destino {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            width: 200px;
            height: 200px;
            background-size: cover;
            background-position: center;
            color: white;
            text-shadow: 1px 1px 3px black;
            border: none;
            cursor: pointer;
        }
        .destino h3 {
            margin: 0;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="left">Inicio</div>
        <div class="right">
            <?php
            session_start();
            if (isset($_SESSION['user'])) {
                echo "Usuario: " . htmlspecialchars($_SESSION['user']);
                echo "<a href='views/logout.php'>Cerrar sesión</a>";
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
        <h1>Bienvenido a la Agencia de Viajes</h1>
        <div class="destinos">
            <h2>Destinos Nacionales</h2>
            <div class="destinos-container">
                <?php
                if ($result_nacionales->num_rows > 0) {
                    while($row = $result_nacionales->fetch_assoc()) {
                        echo "<form action='views/detalles_viaje.php' method='get'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<button type='submit' class='destino' style='background-image: url(" . $row['foto'] . ");'>";
                        echo "<h3>" . htmlspecialchars($row['city']) . "</h3>";
                        echo "</button>";
                        echo "</form>";
                    }
                } else {
                    echo "No hay destinos nacionales disponibles.";
                }
                ?>
            </div>

            <h2>Destinos Internacionales</h2>
            <div class="destinos-container">
                <?php
                if ($result_internacionales->num_rows > 0) {
                    while($row = $result_internacionales->fetch_assoc()) {
                        echo "<form action='views/detalles_viaje.php' method='get'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<button type='submit' class='destino' style='background-image: url(" . $row['foto'] . ");'>";
                        echo "<h3>" . htmlspecialchars($row['city']) . "</h3>";
                        echo "</button>";
                        echo "</form>";
                    }
                } else {
                    echo "No hay destinos internacionales disponibles.";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 Agencia de Viajes. Todos los derechos reservados.</p>
    </div>
</body>
</html>
