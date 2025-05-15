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

// Obtener los datos del formulario de registro
$email = $_POST['email'];
$password = $_POST['password']; // contraseña ingresada en el registro

// Cifrar la contraseña con password_hash()
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Verificar si el correo ya está registrado
$sql_check_email = "SELECT * FROM usuarios WHERE email = ?";
$stmt_check = $conn->prepare($sql_check_email);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    // El correo ya está registrado
    echo "El correo electrónico ya está registrado. Por favor, utiliza otro.";
} else {
    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (email, contrasena) VALUES (?, ?)";
    $stmt
