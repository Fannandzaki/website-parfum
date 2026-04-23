<?php
require_once 'database.php';
$db = new Database();

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama      = $_POST['nama'];
    $brand     = $_POST['brand'];
    $kategori  = $_POST['kategori'];
    $harga     = $_POST['harga'];
    $stok      = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    if ($db->insertProduk($nama, $brand, $kategori, $harga, $stok, $deskripsi)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Gagal menambah data.";
    }
}

require_once 'layout/web_header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm border rounded-4 bg-white">
                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <div class="bg-dark text-white rounded-circle d-inline-flex justify-content-center align-items-center mb-3 shadow-sm" style="width:60px; height:60px;">
                            <i class="bi bi-plus-lg fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Tambah Produk</h3>
                        <p class="text-secondary small">Masukkan data parfum baru ke sistem</p>
                    </div>

                    <?php if (isset($error)) echo "<div class='alert alert-danger rounded-3'>$error</div>"; ?>

                    <form method="POST" action="">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="nama" name="nama"
                                   placeholder="Nama Parfum" required>
                            <label for="nama"><i class="bi bi-droplet me-2"></i>Nama Parfum</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="brand" name="brand"
                                   placeholder="Brand" required>
                            <label for="brand"><i class="bi bi-tag me-2"></i>Brand</label>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select rounded-3" id="kategori" name="kategori" required>
                                        <option value="" disabled selected>Pilih...</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                        <option value="Unisex">Unisex</option>
                                    </select>
                                    <label for="kategori"><i class="bi bi-people me-2"></i>Kategori</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control rounded-3" id="harga" name="harga"
                                           placeholder="Harga" min="0" required>
                                    <label for="harga"><i class="bi bi-cash me-2"></i>Harga (Rp)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control rounded-3" id="stok" name="stok"
                                           placeholder="Stok" min="0" value="0" required>
                                    <label for="stok"><i class="bi bi-boxes me-2"></i>Stok</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control rounded-3" id="deskripsi" name="deskripsi"
                                      placeholder="Deskripsi" style="height:100px;"></textarea>
                            <label for="deskripsi"><i class="bi bi-card-text me-2"></i>Deskripsi</label>
                        </div>

                        <button class="btn btn-dark w-100 py-3 rounded-pill fw-bold shadow-sm mb-3" type="submit">
                            <i class="bi bi-save me-2"></i>Simpan Data
                        </button>
                        <a href="index.php" class="btn btn-outline-secondary w-100 py-2 rounded-pill">
                            Kembali
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'layout/web_footer.php'; ?>
