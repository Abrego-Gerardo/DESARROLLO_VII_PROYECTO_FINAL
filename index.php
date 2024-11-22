<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Agencia de Viajes</title>
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <div class="header">
        <div class="left">Inicio</div>
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
        <h1>Bienvenido a la Agencia de Viajes</h1>
        <p>Aquí podrás encontrar los mejores paquetes de viajes.</p>

        <div class="destinos">
            <h2>Destinos Nacionales</h2>
            <div class="destinos-container">
                <?php
                $conn = new mysqli("localhost", "root", "", "agencia_db");
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM destinos WHERE tipo_destino='Nacional'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='destino' style='background-image: url(" . $row['foto'] . ");'>";
                        echo "<h3>" . $row['city'] . "</h3>";
                        echo "</div>";
                    }
                } else {
                    echo "No hay destinos nacionales disponibles.";
                }
                ?>
            </div>

            <h2>Destinos Internacionales</h2>
            <div class="destinos-container">
                <?php
                $sql = "SELECT * FROM destinos WHERE tipo_destino='Internacional'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='destino' style='background-image: url(" . $row['foto'] . ");'>";
                        echo "<h3>" . $row['city'] . "</h3>";
                        echo "</div>";
                    }
                } else {
                    echo "No hay destinos internacionales disponibles.";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Agencia de Viajes. Todos los derechos reservados.</p>
    </div>
</body>
</html>
