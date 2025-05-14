<?php
session_start();

// Incluir la conexión a la base de datos
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escapar las variables de entrada para evitar inyecciones SQL
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Consulta SQL para verificar el usuario y la contraseña
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $user = $result->fetch_assoc();
        
        // Verificar la contraseña con password_verify (en caso de que la contraseña esté hasheada)
        if (password_verify($password, $user['contrasena'])) {
            // La contraseña es correcta, redirigir a eventos
            header("Location: eventos.html");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: login.html?error=true");
            exit();
        }
    } else {
        // Si no se encuentra el usuario
        header("Location: login.html?error=true");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
}
?>
