<?php
function conectar() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "banco";
    $table = "registro";

    $conexion = new mysqli($hostname, $username, $password, $database);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $conexion->set_charset("utf8");

    return $conexion;
}

$conexion = conectar();
?>
