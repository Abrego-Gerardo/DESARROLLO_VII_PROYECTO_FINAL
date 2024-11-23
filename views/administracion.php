<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Paquetes - Agencia de Viajes</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <div class="header">
        <div class="left">Administración de Paquetes</div>
        <div class="right">
            <?php
            session_start();
            if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] !== 'admin') {
                header("Location: login_form.php");
                exit();
            }
            if (isset($_SESSION['user'])) {
                echo "Usuario: " . htmlspecialchars($_SESSION['user']);
                echo "<a href='logout.php'>Cerrar sesión</a>";
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
        <h1>Administración de Paquetes</h1>
        <a href="agregar_paquete.php"><button type="button">Crear Paquete</button></a>
        <div class="contenido-blanco">
            <h2>Modificar Paquetes</h2>
            <div class="paquete">
                <span>Paquete 1</span>
                <button type="button">Editar</button>
                <button type="button">Eliminar</button>
            </div>
            <!-- Añadir más paquetes según sea necesario -->
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 Agencia de Viajes. Todos los derechos reservados.</p>
    </div>
</body>
</html>

