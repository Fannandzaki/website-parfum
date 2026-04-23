<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfumerie - Nan Company</title>
    <?php require_once './partials/head.php' ?>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark fs-4" href="index.php">
            <i class="bi bi-droplet-fill text-dark me-2"></i>Parfumerie
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
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
            <a href="tambah.php" class="btn btn-dark rounded-pill px-4 ms-lg-3">
                <i class="bi bi-plus-lg me-1"></i>Tambah Produk
            </a>
        </div>
    </div>
</nav>

<main>
