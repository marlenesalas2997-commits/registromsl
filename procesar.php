<?php
// Conexión a la base de datos
$server = "localhost";
$user = "root";
$password = ""; // Por defecto en XAMPP, la contraseña es vacía
$db = "registro_db";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);

// Insertar datos en la base
$sql = "INSERT INTO usuarios (nombre, email, telefono, contraseña) VALUES ('$nombre', '$email', '$telefono', '$contraseña')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso. <a href='index.html'>Volver</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>