<?php
// Start the session at the beginning of your PHP script
session_start();

// Check if logout action is triggered
if(isset($_GET['logout'])) {
    // Destroy session only if it's initialized
    if (isset($_SESSION)) {
        session_unset();
        session_destroy();
    }
    
    // Redirect to login page or any other desired location
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Proyecto</title>
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
                        <a class="nav-link" href="repositorio-descargar-usuario.php">Explorar repositorio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link selected" href="proyecto.php">Proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="comunidad.php">Comunidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="solicitudes.php">Solicitudes de servicio</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-5" style="margin-right: -800px;">
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?logout=true">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Project picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Foto de perfil</div>
                    <div class="card-body text-center">
                        <!-- Project picture image-->
                        <img class="img-account-profile rounded-circle mb-2" id="profileImage" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Project picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no puede tener un tamaño de mas de 5MB</div>
                        <!-- Project picture upload button-->
                        <input type="file" id="uploadImage" style="display: none;" accept=".jpg, .jpeg, .png">
                        <button class="btn btn-primary" type="button" onclick="document.getElementById('uploadImage').click();">Cambiar foto</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Project details card-->
                <div class="card mb-4">
                    <div class="card-header">Detalles del Proyecto</div>
                    <div class="card-body">
                        <form>
                            <!-- Pre-selected fields -->
                            <div class="mb-3">
                                <label class="form-label" for="nombreProyecto">Nombre</label>
                                <input class="form-control" id="nombreProyecto" type="text" value="Nombre del Proyecto" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="propietario">Propietario</label>
                                <input class="form-control" id="propietario" type="text" value="Nombre del Propietario" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="areaComercio">Área de comercio</label>
                                <input class="form-control" id="areaComercio" type="text" value="Área de Comercio" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" rows="5" readonly>Descripción del Proyecto</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="estado">Estado</label>
                                <input class="form-control" id="estado" type="text" value="Estado del Proyecto" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="convocatoria">Convocatoria</label>
                                <input class="form-control" id="convocatoria" type="text" value="Convocatoria" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="productos">Productos</label>
                                <input class="form-control" id="productos" type="text" value="Productos del Proyecto" readonly>
                            </div>

                            <!-- Información general del proyecto -->
                            <div class="mb-3">
                                <label class="form-label" for="informacionProyecto">Información general del proyecto</label>
                                <textarea class="form-control" id="informacionProyecto" rows="5" placeholder="Ingrese la información general del proyecto"></textarea>
                            </div>
                            <!-- Contacto -->
                            <div class="mb-3">
                                <label class="form-label" for="contacto">Contacto</label>
                                <textarea class="form-control" id="contacto" rows="5" placeholder="Ingrese la información de contacto"></textarea>
                            </div>

                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="button" onclick="saveChanges()">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function saveChanges() {
            // Add your logic to save changes here
            alert('Changes saved!');
        }

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
