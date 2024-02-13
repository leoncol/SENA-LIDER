<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.html");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lider";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nombres = $_POST['Nombres'];
    $apellidos = $_POST['Apellidos'];
    $empresa = $_POST['Empresa'];
    $ubicacion = $_POST['Ubicacion'];
    $correo = $_POST['Correo'];
    $telefono = $_POST['Teléfono'];

    // Update user information in the database
    $user_email = $_SESSION['user_email'];
    $sql = "UPDATE usuario SET Nombres='$nombres', Apellidos='$apellidos', Empresa='$empresa', Ubicacion='$ubicacion', Correo='$correo', Teléfono='$telefono' WHERE Correo='$user_email'";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to perfil.php with notification parameter
        header("Location: perfil.php?updated=true");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>