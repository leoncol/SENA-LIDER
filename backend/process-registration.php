<?php
// Ensure you have a secure way to store database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lider";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$names = isset($_POST['names']) ? $_POST['names'] : '';
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : ''; // Hash the password for security

// Validate that required fields are not empty
if (empty($names) || empty($lastname) || empty($phone) || empty($email) || empty($city) || empty($password)) {
    die("Error: All fields are required");
}

// Insert data into the database
$sql = "INSERT INTO usuario (Nombres, Apellidos, inscripcion, Teléfono, Correo, Contraseña, Ciudad) 
        VALUES ('$names', '$lastname', NOW(), '$phone', '$email', '$password', '$city')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
