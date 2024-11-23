<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "agencia_db";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Cagaste Light");
}

?>