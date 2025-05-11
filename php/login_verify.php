<?php
// Conectar a la base de datos
$host = "localhost";
$username = "root"; // tu usuario de base de datos
$password = ""; // tu contraseña de base de datos
$dbname = "trabajando_db"; // tu base de datos

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$email = $_POST['email'];
$contrasena = $_POST['password']; // Contraseña ingresada en el formulario

// Consulta para verificar si el correo y la contraseña existen en la nueva tabla
$sql = "SELECT * FROM usuarios_temp WHERE email = ? AND contrasena = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $contrasena);
$stmt->execute();
$result = $stmt->get_result();

// Si el usuario existe
if ($result->num_rows > 0) {
    // Redirigir a eventos.html si el login es exitoso
    header("Location: /hulul_software/eventos.html");
    exit(); // Asegurarse de que el script termine después de la redirección
} else {
    // Usuario o contraseña incorrectos
    echo "Correo o contraseña incorrectos. Intenta de nuevo.";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
