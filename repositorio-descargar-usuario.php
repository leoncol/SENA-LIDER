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
    <title>Explorar repositorio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .task-table {
            margin-top: 30px;
        }

        th, td {
            text-align: center;
        }

        .status {
            font-weight: bold;
        }

        .status.pending {
            color: #ffc107;
        }

        .status.completed {
            color: #28a745;
        }

        .status.in-progress {
            color: #007bff;
        }

        .status.on-hold {
            color: #dc3545;
        }
    </style>
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
                        <a class="nav-link selected" href="repositorio-descargar-usuario.php">Explorar repositorio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="proyecto.php">Proyecto</a>
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
                        <a class="nav-link perfil" href="perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?logout=true">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <center><h1>Explorar repositorio</h1></center>
    <!-- Page Content -->
    <div class="parent">
        <!-- Search Bar -->
        <div class="custom-form-group">
           <label for="search" class="form-label">Buscar Documento</label>
           <hr>
           <input type="text" class="form-control" id="search" name="search" placeholder="Buscar documentos...">
           <br>
           <button type="button" class="btn custom-button-color" onclick="searchDocuments()">Buscar</button>
       </div>

       <!-- Display Search Results -->

       <div class="custom-form-group">
           <label for="nombre" class="form-label">Nombre</label>
           <hr>
           <!-- Automatically set name based on uploaded file -->
           <input type="text" class="form-control" id="nombre" name="nombre" value="John Doe" readonly>
       </div>
       <div class="custom-form-group">
           <label for="fecha" class="form-label">Fecha</label>
           <hr>
           <!-- Automatically set date based on uploaded file -->
           <input type="date" class="form-control" id="fecha" name="fecha" value="2023-01-01" readonly>
       </div>
       <!-- "Comentario" removed -->
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function searchDocuments() {
            // Get the search query from the input field
            var searchQuery = document.getElementById('search').value;

            // Perform an AJAX request to the server to fetch search results
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'search.php?query=' + encodeURIComponent(searchQuery), true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Display search results in the 'searchResults' div
                    document.getElementById('searchResults').innerHTML = xhr.responseText;
                }
            };

            xhr.send();
        }
    </script>
</body>
</html>
