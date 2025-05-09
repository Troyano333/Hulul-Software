<?php
date_default_timezone_set("America/Bogota");

// Conexión
$conexion = new mysqli("localhost", "root", "", "trabajando_db");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar datos obligatorios
if (!isset($_POST['nombre'], $_POST['apellido'], $_POST['tipo_palco'], $_POST['email'], $_POST['telefono'], $_POST['fecha_reserva'], $_POST['hora_reserva'], $_POST['lugar'])) {
    die("error: Faltan datos obligatorios.");
}

// Obtener datos
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo_palco = $_POST['tipo_palco'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha_reserva'];
$hora = $_POST['hora_reserva'];
$lugar = $_POST['lugar'];

// Validar si la hora ya pasó hoy
$fecha_actual = date("Y-m-d");
$hora_actual = date("H:i");
if ($fecha == $fecha_actual && $hora <= $hora_actual) {
    echo "error: No puedes reservar para una hora pasada.";
    exit;
}

// Verificar si ya existe una reserva en esa fecha, hora y lugar
$verificar = $conexion->prepare("SELECT * FROM reservas WHERE fecha_reserva = ? AND hora_reserva = ? AND lugar = ?");
$verificar->bind_param("sss", $fecha, $hora, $lugar);
$verificar->execute();
$resultado = $verificar->get_result();

if ($resultado->num_rows > 0) {
    echo "error: Ya existe una reserva en esa fecha, hora y lugar.";
    $verificar->close();
    $conexion->close();
    exit;
}
$verificar->close();

// Insertar nueva reserva
$stmt = $conexion->prepare("INSERT INTO reservas (nombre, apellido, tipo_palco, email, telefono, fecha_reserva, hora_reserva, lugar) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $nombre, $apellido, $tipo_palco, $email, $telefono, $fecha, $hora, $lugar);

if ($stmt->execute()) {
    // Redirigir a la página de confirmación de pago con los datos
    header("Location: ../confirmacion_pago.html?nombre=" . urlencode($nombre) . "&fecha=" . urlencode($fecha) . "&hora=" . urlencode($hora) . "&lugar=" . urlencode($lugar) . "&palco=" . urlencode($tipo_palco));
    exit;
} else {
    echo "error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
