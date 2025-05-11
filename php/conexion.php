<?php
$conexion = new mysqli("localhost", "root", "", "trabajando_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
