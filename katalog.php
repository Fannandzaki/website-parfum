<?php
require_once 'database.php';
$db = new Database();

// Filter kategori
$kategori_filter = $_GET['kategori'] ?? '';

// Ambil semua produk
$semua = $db->getAllProduk();

// Filter manual
$dataProduk = [];
foreach ($semua as $p) {
    if ($kategori_filter === '' || $p['kategori'] === $kategori_filter) {
        $dataProduk[] = $p;
    }
}

require_once 'layout/web_header.php';
?>

<div class="container py-5">

    <!-- Page Title -->
    <div class="mb-4">
        <h4 class="fw-bold"><i class="bi bi-grid-fill text-dark me-2"></i>Katalog Parfum</h4>
        <p class="text-secondary small">Temukan parfum pilihan Anda</p>
    </div>

    <!-- Filter Kategori -->
    <div class="mb-4 d-flex gap-2 flex-wrap">
        <a href="katalog.php" class="btn btn-sm rounded-pill <?= $kategori_filter === '' ? 'btn-dark fw-bold' : 'btn-outline-secondary' ?>">
            Semua
        </a>
        <?php foreach (['Pria', 'Wanita', 'Unisex'] as $kat): ?>
        <a href="katalog.php?kategori=<?= $kat ?>"
           class="btn btn-sm rounded-pill <?= $kategori_filter === $kat ? 'btn-dark fw-bold' : 'btn-outline-secondary' ?>">
            <?= $kat ?>
        </a>
        <?php endforeach; ?>
    </div>

    <!-- Product Cards -->
    <div class="row g-4">
        <?php foreach ($dataProduk as $row): ?>
        <div class="col-sm-6 col-lg-4">
            <div class="card h-100 border shadow-sm bg-white rounded-4">
                <div class="card-body p-4">

                    <!-- Icon & Badge -->
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="bg-light border text-dark rounded-circle d-flex justify-content-center align-items-center" style="width:50px; height:50px;">
                            <i class="bi bi-droplet-fill fs-4"></i>
                        </div>
                        <span class="badge bg-light border text-dark rounded-pill px-3 py-2">
                            <?= htmlspecialchars($row['kategori']) ?>
                        </span>
                    </div>

                    <!-- Info -->
                    <h5 class="fw-bold mb-1"><?= htmlspecialchars($row['nama']) ?></h5>
                    <p class="text-secondary small mb-2"><?= htmlspecialchars($row['brand']) ?></p>
                    <p class="text-secondary small mb-3" style="min-height:40px;">
                        <?= htmlspecialchars(mb_strimwidth($row['deskripsi'], 0, 80, '...')) ?>
                    </p>

                    <!-- Harga & Stok -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-bold text-dark fs-5">
                            Rp <?= number_format($row['harga'], 0, ',', '.') ?>
                        </span>
                        <span class="badge <?= $row['stok'] > 0 ? 'bg-dark text-white' : 'bg-light text-secondary border' ?> rounded-pill px-3 py-2">
                            Stok: <?= $row['stok'] ?>
                        </span>
                    </div>

                </div>
                <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0 d-flex gap-2">
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-outline-dark btn-sm flex-fill rounded-pill">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <form method="POST" action="index.php" class="flex-fill"
                          onsubmit="return confirm('Hapus <?= htmlspecialchars($row['nama']) ?>?');">
                        <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100 rounded-pill">
                            <i class="bi bi-trash3 me-1"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if (empty($dataProduk)): ?>
        <div class="col-12 text-center py-5">
            <i class="bi bi-inbox fs-1 text-secondary d-block mb-3"></i>
            <p class="text-secondary">Tidak ada produk ditemukan.</p>
            <a href="tambah.php" class="btn btn-dark btn-sm rounded-pill px-4 fw-bold">
                <i class="bi bi-plus-lg me-1"></i>Tambah Produk
            </a>
        </div>
        <?php endif; ?>
    </div>

</div>

<?php require_once 'layout/web_footer.php'; ?>
