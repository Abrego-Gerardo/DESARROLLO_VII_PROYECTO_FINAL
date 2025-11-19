<<<<<<< HEAD
<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "agencia_db";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Error de conexión");
}

=======
<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "agencia_db";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Error de conexión");
}
$mysqli = new mysqli($hostName, $dbUser, $dbPassword, $dbName);
return $mysqli;
>>>>>>> dc6a5a2f1e6ace20a6577ba0bfcd6d6f2a34f3ac
?>