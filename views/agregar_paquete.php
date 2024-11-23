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
