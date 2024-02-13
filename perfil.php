<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.html");
    exit();
}

// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lider";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user email from the session
if(isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
} else {
    // Handle case where user email is not set
    echo "User email not found";
    exit; // Terminate script
}

// Fetch user information from the database
$sql = "SELECT * FROM usuario WHERE Correo = '$user_email'";
$result = $conn->query($sql);

if ($result && $result->num_rows == 1) {
    $usuario = $result->fetch_assoc(); // Fetch user data
} else {
    // Handle case where user data is not found
    echo "User data not found";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #3daf04;">
        <div class="container">
            <a class="navbar-brand text-white" href="#" style="margin-left: -700px;"><img alt="Logo" style="max-height:42px; padding-top:3px; "src="images/logo_blanco.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="repositorio-descargar-usuario.html">Explorar repositorio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="proyecto.html">Proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="comunidad.html">Comunidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="solicitudes.html">Solicitudes de servicio</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-5" style="margin-right: -800px;">
                    <li class="nav-item">
                        <a class="nav-link selected" href="perfil.php">Perfil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="perfil.php" target="__blank">Perfil</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Foto de perfil</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" id="profileImage" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no puede tener un tamaño de mas de 5MB</div>
                        <!-- Profile picture upload button-->
                        <input type="file" id="uploadImage" style="display: none;" accept=".jpg, .jpeg, .png">
                        <button class="btn custom-button-color" type="button" onclick="document.getElementById('uploadImage').click();">Cambiar foto</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Información de la cuenta</div>
                    <div class="card-body">
                        <form method="post" action="../SENA-LIDER/perfil.php">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3 form-row-gx-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Nombres</label>
                                    <input class="form-control" id="inputFirstName" type="text" name="Nombres" value="<?php echo $usuario['Nombres']; ?>" placeholder="Ingrese sus nombres">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Apellidos</label>
                                    <input class="form-control" id="inputLastName" type="text" name="Apellidos" value="<?php echo $usuario['Apellidos']; ?>" placeholder="Ingrese sus apellidos">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3 form-row-gx-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Empresa</label>
                                    <input class="form-control" id="inputOrgName" type="text" name="Empresa" value="<?php echo $usuario['Empresa']; ?>" placeholder="Ingrese el nombre de su empresa">
                                </div>
                                <!-- Form Group (Ubicacion)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Ubicación</label>
                                    <input class="form-control" id="inputLocation" type="text" name="Ubicacion" value="<?php echo $usuario['Ubicacion']; ?>" placeholder="Ingrese la ciudad donde se encuentra ubicado">
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3 form-row-gx-3">
                                <!-- Form Group (email address)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmailAddress">Correo electrónico</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" name="Correo" value="<?php echo $usuario['Correo']; ?>" placeholder="Ingrese su correo electrónico">
                                </div>
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Número teléfonico</label>
                                    <input class="form-control" id="inputPhone" type="tel" name="Teléfono" value="<?php echo $usuario['Teléfono']; ?>" placeholder="Ingrese su número de teléfono">
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3 form-row-gx-3">
                                <!-- Form Group (role)-->
                                <div class="col-md-6 mt-3">
                                    <label class="small mb-1" for="inputRole">Rol</label>
                                    <div class="gray-field">
                                        <input class="form-control" id="inputRole" type="text" value="<?php echo $usuario['Rol']; ?>" placeholder="Pre-selected rol" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn custom-button-color" type="submit">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['updated']) && $_GET['updated'] === 'true'): ?>
        <div class="alert alert-success" role="alert">
            Your information has been updated successfully!
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // Display selected image on file input change
        document.getElementById('uploadImage').addEventListener('change', function () {
            var input = this;
            var image = document.getElementById('profileImage');
            var reader = new FileReader();

            reader.onload = function (e) {
                image.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        });
    </script>
</body>
</html>
