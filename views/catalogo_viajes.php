<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Viajes - Agencia de Viajes</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <div class="header">
        <div class="left">Catálogo de Viajes</div>
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
        <h1>¿A dónde quieres ir?</h1>
        <form action="buscar_viajes.php" method="post">
            <label for="origen">Origen:</label>
            <input type="text" id="origen" name="origen" required>
            <label for="destino">Destino:</label>
            <input type="text" id="destino" name="destino" required>
            <label for="fecha_salida">Fecha de Salida:</label>
            <input type="date" id="fecha_salida" name="fecha_salida" required>
            <label for="tipo_viaje">Tipo de Viaje:</label>
            <select id="tipo_viaje" name="tipo_viaje" required>
                <option value="aire">Aire</option>
                <option value="mar">Mar</option>
                <option value="tierra">Tierra</option>
            </select>
            <button type="submit">Buscar Viaje</button>
        </form>
        <div class="calendario">
            <h2>Calendario</h2>
            <p>Noviembre 2024</p>
            <!-- Aquí podrías integrar un calendario interactivo -->
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 Agencia de Viajes. Todos los derechos reservados.</p>
    </div>
</body>
</html>

