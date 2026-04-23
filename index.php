<?php
require_once 'database.php';
$db = new Database();

// Logic untuk menghapus data
if (isset($_POST['delete_id'])) {
    $db->deleteProduk($_POST['delete_id']);
    header("Location: index.php");
    exit();
}

// Menarik semua data produk
$dataProduk = $db->getAllProduk();

require_once 'layout/web_header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="card shadow-lg border-0 rounded-4 bg-body-tertiary">

                <div class="card-header border-0 bg-transparent d-flex justify-content-between align-items-center p-4">
                    <div>
                        <h4 class="mb-0 fw-bold">
                            <i class="bi bi-droplet-fill text-warning me-2"></i>Data Produk Parfum
                        </h4>
                        <p class="text-secondary mb-0 small">Parfumerie &mdash; Nan Company</p>
                    </div>
                    <a href="tambah.php" class="btn btn-warning rounded-pill px-4 shadow-sm text-dark fw-bold">
                        <i class="bi bi-plus-lg me-1"></i>Tambah Produk
                    </a>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="ps-4">#</th>
                                    <th>Nama Parfum</th>
                                    <th>Brand</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataProduk as $index => $row): ?>
                                <tr>
                                    <td class="ps-4 fw-medium text-secondary"><?= $index + 1 ?></td>
                                    <td>
                                        <div class="d-flex align-items-center py-1">
                                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex justify-content-center align-items-center me-3" style="width:40px; height:40px;">
                                                <i class="bi bi-droplet fs-5"></i>
                                            </div>
                                            <div>
                                                <span class="fw-semibold"><?= htmlspecialchars($row['nama']) ?></span>
                                                <div class="text-secondary small"><?= htmlspecialchars(mb_strimwidth($row['deskripsi'], 0, 50, '...')) ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($row['brand']) ?></td>
                                    <td class="text-center">
                                        <?php
                                        $badgeClass = match($row['kategori']) {
                                            'Pria'   => 'bg-primary',
                                            'Wanita' => 'bg-pink',
                                            default  => 'bg-secondary'
                                        };
                                        ?>
                                        <span class="badge <?= $badgeClass ?> bg-opacity-25 px-3 py-2 rounded-pill border border-<?= $row['kategori']==='Pria'?'primary':($row['kategori']==='Wanita'?'danger':'secondary') ?> border-opacity-25">
                                            <?= htmlspecialchars($row['kategori']) ?>
                                        </span>
                                    </td>
                                    <td class="text-center fw-semibold text-warning">
                                        Rp <?= number_format($row['harga'], 0, ',', '.') ?>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge <?= $row['stok'] > 0 ? 'bg-success' : 'bg-danger' ?> bg-opacity-25 px-3 py-2 rounded-pill">
                                            <?= $row['stok'] ?> pcs
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning rounded-circle me-1" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form method="POST" action="" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus <?= htmlspecialchars($row['nama']) ?>?');">
                                            <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" title="Hapus">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                <?php if (empty($dataProduk)): ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <i class="bi bi-inbox fs-1 text-secondary d-block mb-3"></i>
                                        <p class="text-secondary mb-0">Belum ada produk yang terdaftar.</p>
                                        <a href="tambah.php" class="btn btn-warning btn-sm mt-3 rounded-pill px-4 text-dark fw-bold">
                                            <i class="bi bi-plus-lg me-1"></i>Tambah Produk Pertama
                                        </a>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer border-0 bg-transparent text-secondary small p-3 ps-4">
                    Total: <strong><?= count($dataProduk) ?></strong> produk terdaftar
                </div>

            </div>
        </div>
    </div>
</div>

<?php require_once 'layout/web_footer.php'; ?>
