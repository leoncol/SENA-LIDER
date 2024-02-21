<?php
session_start();
$_SESSION['ultimo_acceso'] = time();
include 'backend/session-verification.php';
verificarSesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comunidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

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
                    <a class="nav-link selected" href="comunidad-lider-func.html">Comunidad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="solicitudes-lider-func.html">Solicitudes de servicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro-empresa-lider-func.html">Registro de empresa</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-5" style="margin-right: -800px;">
                <li class="nav-item">
                    <a class="nav-link" href="perfil-lider-func.html">Perfil</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h1>Proyectos LIDER</h1>
    <p>Ingrese el nombre del proyecto o seleccione un proyecto de la lista inferior.</p>
    
    <!-- Filter by Category -->
    <div class="row mt-3">
        <div class="col-md-8">
            <h6>Filtrar por categoría</h6>
            <select class="form-select" aria-label="Filter by Category">
                <option selected>Filtrar por categoría</option>
                <option value="1">Application</option>
                <option value="2">Design</option>
                <option value="3">Desktop</option>
                <option value="4">Management</option>
                <option value="5">Mobile</option>
            </select>
        </div>
    </div>

    <!-- Filter by Date -->
    <div class="row mt-3">
        <div class="col-md-6">
            <h6>Filtrar por fecha</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text">Desde</span>
                <input type="text" class="form-control datepicker" readonly placeholder="Select date" aria-label="From date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text">Hasta</span>
                <input type="text" class="form-control datepicker" readonly placeholder="Select date" aria-label="From date">
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="row mt-3">
        <div class="col-md-15">
            <h6>Buscar por nombre</h6>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Ingrese el nombre del proyecto.." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </div>

    <!-- List of Items -->
    <div class="mt-4">
        <h5>Lista de Proyectos</h5>
        <ul class="list-group">
            <li class="list-group-item">Proyecto 1</li>
            <li class="list-group-item">Proyecto 2</li>
            <li class="list-group-item">Proyecto 3</li>
            <!-- Add more items as needed -->
        </ul>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Datepicker Initialization -->
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#datepicker-trigger').on('click', function(){
            $('.datepicker').datepicker('show');
        });
    });
</script>

</body>
</html>
