<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "natural_pet";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('No se pudo conectar a la base de datos.')</script>");
}

?>