<?php
// Qui puoi mettere del codice PHP se necessario
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestione Libreria</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icone Bootstrap (per eventuali icone nelle voci della navbar) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        main {
            flex: 1;
            padding: 20px;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Libreria</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createLibro_form.php">Inserimento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="eliminaLibro_form.php">Elimina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="visualizzaLibri.php">Visualizza</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aggiornaPrezzo_form.php">Aggiorna Prezzo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>