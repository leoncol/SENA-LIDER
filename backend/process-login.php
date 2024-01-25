<?php
// Ensure you have a secure way to store database credentials
$servername = "localhost";
$username = "root";
$password = "shinobi";
$dbname = "lider";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Validate that required fields are not empty
if (empty($email) || empty($password)) {
    die("Error: Email and password are required");
}

// Prepare SQL statement to retrieve user data based on email
$sql = "SELECT * FROM usuario WHERE Correo = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User found, verify password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['Contraseña'])) {
        // Password is correct, redirect or set session
        session_start();
        $_SESSION['user_email'] = $row['Correo']; // Adjusted to 'Correo'
        // Redirect to dashboard or any other page
        header("Location: ../perfil.html");
        exit();
    } else {
        // Password is incorrect
        echo "Incorrect password";
    }
} else {
    // User not found
    echo "User not found";
}

// Close the database connection
$conn->close();
?>