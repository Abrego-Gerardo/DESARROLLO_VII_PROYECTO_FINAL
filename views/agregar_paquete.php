<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "agencia_db");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar la creación del nuevo paquete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $tipo_destino = $_POST['tipo_destino'];
    $precio_nino = $_POST['precio_nino'];
    $precio_adulto = $_POST['precio_adulto'];
    $precio_mayor = $_POST['precio_mayor'];
    $detalles = $_POST['detalles'];

    // Manejar la subida de la foto
    $foto = $_FILES['foto'];
    $fotoRuta = "";

    if ($foto['error'] === UPLOAD_ERR_OK) {
        $fotoNombre = basename($foto['name']);
        $fotoExtension = strtolower(pathinfo($fotoNombre, PATHINFO_EXTENSION));

        if ($fotoExtension === "jpg") {
            $fotoRuta = "fotos/" . uniqid() . ".jpg";
            if (move_uploaded_file($foto['tmp_name'], $fotoRuta)) {
                echo "Foto subida correctamente.<br>";

    $sql = "INSERT INTO destinos (city, tipo_destino, precio_nino, precio_adulto, precio_mayor, detalles) VALUES ('$nombre', '$tipo_destino', '$precio_nino', '$precio_adulto', '$precio_mayor', '$detalles')";
    if ($conn->query($sql) === TRUE) {
        echo "Paquete creado correctamente.";
    } else {
        echo "Error al crear el paquete: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Paquete - Agencia de Viajes</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <div class="header">
        <div class="left">Agregar Paquete</div>
        <div class="right">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo "Usuario: " . htmlspecialchars($_SESSION['username']);
            } else {
                echo "Error al subir la foto.<br>";
            }
       } else {
            echo "Solo se permiten archivos JPG.<br>";
        }
    } else {
        echo "Error al cargar la foto.<br>";
    }

    // Insertar datos en la base de datos
    $sql = "INSERT INTO destinos (city, tipo_destino, precio_nino, precio_adulto, precio_mayor, detalles, foto) 
            VALUES ('$nombre', '$tipo_destino', '$precio_nino', '$precio_adulto', '$precio_mayor', '$detalles', '$fotoRuta')";
    if ($conn->query($sql) === TRUE) {
        echo "Paquete creado correctamente.";
    } else {
        echo "Error al crear el paquete: " . $conn->error;
    }

    $conn->close();
}
?>

            ?>
        </div>
    </div>
    <div class="nav">
        <a href="../index.php">Inicio</a>
        <a href="catalogo_viajes.php">Catálogo de Viajes</a>
        <a href="reservas.php">Reservas</a>
        <a href="administracion.php">Administración</a>
        <a href="contacto.php">Soporte y Contacto</a>
    </div>
    <div class="main-content">
        <h1>Agregar Detalles del Paquete</h1>
        <form action="agregar_paquete.php" method="post">
            <label for="nombre">Nombre del Paquete:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre del Paquete" required>
            <label for="tipo_destino">Tipo de Destino:</label>
            <select id="tipo_destino" name="tipo_destino" required>
                <option value="Nacional">Nacional</option>
                <option value="Internacional">Internacional</option>
            </select>
            <label for="precio_nino">Precio Niño:</label>
            <input type="number" id="precio_nino" name="precio_nino" placeholder="Precio Niño" required>
            <label for="precio_adulto">Precio Adulto:</label>
            <input type="number" id="precio_adulto" name="precio_adulto" placeholder="Precio Adulto" required>
            <label for="precio_mayor">Precio Mayor:</label>
            <input type="number" id="precio_mayor" name="precio_mayor" placeholder="Precio Mayor" required>
            <label for="detalles">Detalles:</label>
            <textarea id="detalles" name="detalles" placeholder="Detalles del Paquete" required></textarea>
            <button type="submit">Crear Paquete</button>
        </form>
    </div>
    <div class="footer">
        <p>&copy; 2023 Agencia de Viajes. Todos los derechos reservados.</p>
    </div>
</body>
</html>
