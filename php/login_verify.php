<?php
<<<<<<< HEAD
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
=======
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
>>>>>>> d73901e1e9b47c6105ca7ce100b704174521a6be
?>
