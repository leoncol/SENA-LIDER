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
    <title>Solicitudes de servicio LIDER</title>
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
                        <a class="nav-link" href="repositorio-descargar-usuario.php">Explorar repositorio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="proyecto.php">Proyecto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="comunidad.php">Comunidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link selected" href="solicitudes.php">Solicitudes de servicio</a>
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
    <center><h1>Solicitudes de servicio</h1></center>
    <!-- Page Content -->
    <div class="parent">
        <div class="custom-form-group">
            <label for="empresa" class="form-label">Empresa</label>
            <hr>
            <select class="form-select form-control" id="empresa" name="empresa" required>
                <option value="" selected disabled>Select Empresa</option>
                <option value="company1">Company 1</option>
                <option value="company2">Company 2</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="custom-form-group">
            <label for="servicio" class="form-label">Servicio</label>
            <hr>
            <select class="form-select form-control" id="servicio" name="servicio" required>
                <option value="" selected disabled>Select Servicio</option>
                <option value="service1">Service 1</option>
                <option value="service2">Service 2</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="custom-form-group">
            <label for="comentario" class="form-label">Comentario</label>
            <hr>
            <input type="text" class="form-control" id="comentario" name="comentario" required>
            <br>
            <button type="submit" class="btn custom-button-color" onclick="submitRequest()">Enviar</button>
        </div>
    </div>

    <!-- To-Do Panel -->
    <div class="container offset-md-0">
        <h1 class="mt-5 mb-4">Mis solicitudes</h1>

        <table class="table task-table" id="taskTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Service</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table body content will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function submitRequest() {
            // Get values from form
            var empresa = document.getElementById("empresa").value;
            var solicitante = document.getElementById("solicitante").value;
            var servicio = document.getElementById("servicio").value;

            // Create a new row for the table
            var newRow = document.createElement("tr");

            // Add cells to the new row
            var indexCell = document.createElement("th");
            indexCell.scope = "row";
            indexCell.textContent = document.getElementById("taskTable").rows.length;
            newRow.appendChild(indexCell);

            var serviceCell = document.createElement("td");
            serviceCell.textContent = servicio;
            newRow.appendChild(serviceCell);

            var statusCell = document.createElement("td");
            statusCell.innerHTML = '<span class="status pending">Pending</span>';
            newRow.appendChild(statusCell);

            // Add the new row to the table
            document.getElementById("taskTable").getElementsByTagName('tbody')[0].appendChild(newRow);
        }
    </script>
</body>
</html>

