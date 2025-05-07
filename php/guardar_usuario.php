<?php
session_start();  // Necesario para usar $_SESSION

include("conexion.php");  // Asegúrate que esta línea esté incluida si la conexión no está aquí

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $cedula = trim($_POST['cedula']);
    $direccion = trim($_POST['direccion']);
    $celular = trim($_POST['celular']);
    $email = trim($_POST['email']);
    $contrasena = trim($_POST['contrasena']);

    if (!empty($nombre) && !empty($cedula) && !empty($direccion) && !empty($celular) && !empty($email) && !empty($contrasena)) {

        // Preparar sentencia segura (recomendado)
        $sql = "INSERT INTO usuarios (nombre, cedula, direccion, celular, email, contrasena) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $nombre, $cedula, $direccion, $celular, $email, $contrasena);

        if (mysqli_stmt_execute($stmt)) {
            // Guardar datos de sesión
            $_SESSION['nombre'] = $nombre;
            $_SESSION['email'] = $email;

            header("Location: ../eventos.html");
            exit();
        } else {
            echo "Error al registrar usuario: " . mysqli_error($conexion);
            exit();
        }

    } else {
        echo "Todos los campos son obligatorios. Por favor, complétalos.";
        exit();
    }

} else {
    echo "Acceso denegado.";
    exit();
}
?>
