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
    $tipo_viaje = $_POST['tipo_viaje']; // Nuevo parámetro
    $fecha_salida = $_POST['fecha_salida']; // Nuevo parámetro
    $fecha_retorno = $_POST['fecha_retorno']; // Nuevo parámetro
    $precio_nino = $_POST['precio_nino'];
    $precio_adulto = $_POST['precio_adulto'];
    $precio_mayor = $_POST['precio_mayor'];
    $detalles = $_POST['detalles'];
    $foto = $_FILES['foto']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($foto);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen
    $check = getimagesize($_FILES['foto']['tmp_name']);
    if($check !== false) {
        // Permitir solo ciertos formatos de imagen
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if(in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $sql = "INSERT INTO destinos (city, tipo_destino, tipo_viaje, fecha_salida, fecha_retorno, precio_nino, precio_adulto, precio_mayor, detalles, foto) VALUES ('$nombre', '$tipo_destino', '$tipo_viaje', '$fecha_salida', '$fecha_retorno', '$precio_nino', '$precio_adulto', '$precio_mayor', '$detalles', '$target_file')";
                if ($conn->query($sql) === TRUE) {
                    echo "Paquete creado correctamente.";
                } else {
                    echo "Error al crear el paquete: " . $conn->error;
                }
            } else {
                echo "Error al subir la imagen.";
            }
        } else {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        }
    } else {
        echo "El archivo no es una imagen.";
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
        <h1>Agregar Detalles del Paquete</h1>
        <form action="agregar_paquete.php" method="post" enctype="multipart/form-data">
            <label for="nombre">Nombre del Paquete:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre del Paquete" required>
            <label for="tipo_destino">Tipo de Destino:</label>
            <select id="tipo_destino" name="tipo_destino" required>
                <option value="Nacional">Nacional</option>
                ```php
                <option value="Internacional">Internacional</option>
            </select>
            <label for="tipo_viaje">Tipo de Viaje:</label>
            <select id="tipo_viaje" name="tipo_viaje" required>
                <option value="Aire">Aire</option>
                <option value="Mar">Mar</option>
                <option value="Tierra">Tierra</option>
            </select>
            <label for="fecha_salida">Fecha de Salida:</label>
            <input type="date" id="fecha_salida" name="fecha_salida" required>
            <label for="fecha_retorno">Fecha de Retorno:</label>
            <input type="date" id="fecha_retorno" name="fecha_retorno" required>
            <label for="precio_nino">Precio Niño:</label>
            <input type="number" id="precio_nino" name="precio_nino" placeholder="Precio Niño" required>
            <label for="precio_adulto">Precio Adulto:</label>
            <input type="number" id="precio_adulto" name="precio_adulto" placeholder="Precio Adulto" required>
            <label for="precio_mayor">Precio Mayor:</label>
            <input type="number" id="precio_mayor" name="precio_mayor" placeholder="Precio Mayor" required>
            <label for="detalles">Detalles:</label>
            <textarea id="detalles" name="detalles" placeholder="Detalles del Paquete" required></textarea>
            <label for="foto">Imagen del Paquete:</label>
            <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png,.gif" required>
            <button type="submit">Crear Paquete</button>
        </form>
    </div>
    <div class="footer">
        <p>&copy; 2024 Agencia de Viajes. Todos los derechos reservados.</p>
    </div>
</body>
</html>