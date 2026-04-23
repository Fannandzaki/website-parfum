<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfumerie - Maroon Company</title>
    <?php require_once './partials/head.php' ?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="bi bi-droplet-fill text-warning me-2"></i>Parfumerie
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="bi bi-house me-1"></i>Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="katalog.php"><i class="bi bi-grid me-1"></i>Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tentang.php"><i class="bi bi-info-circle me-1"></i>Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontak.php"><i class="bi bi-envelope me-1"></i>Kontak</a>
                </li>
            </ul>
            <a href="tambah.php" class="btn btn-warning btn-sm px-3">
                <i class="bi bi-plus-lg me-1"></i>Tambah Produk
            </a>
        </div>
    </div>
</nav>

<main>
