<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Gestión de Usuarios</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h1>Gestión de Usuarios</h1>
        <form action="../login.php" method="post">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <a href="register_form.php">Registrarse</a>
        <a href="recover_password_form.php">¿No recuerdas tu contraseña? Recuperar Contraseña</a>
    </div>
</body>
</html>
