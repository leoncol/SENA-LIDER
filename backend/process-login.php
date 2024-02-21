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
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$rol = isset($_POST['rol']) ? $_POST['rol'] : '';   
            
// Validate that required fields are not empty
if (empty($email) || empty($password) || empty($rol)) {
    die("Error: Email, rol and password are required");
}

// Prepare SQL statement to retrieve user data based on email
$sql = "SELECT * FROM $rol WHERE Correo = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User found, verify password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['Contraseña'])) {
        // Password is correct, set session
        session_start();
        $_SESSION['time'] = time();
        $_SESSION['user_email'] = $row['Correo']; // Adjusted to 'Correo'
        // Redirect to profile page
        $_SESSION['id']= $row['ID'];
        $_SESSION['rol']=$rol;
        
        header("Location: ../perfil.php");
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
