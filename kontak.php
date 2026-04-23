<?php
$success = false;
$error   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = trim($_POST['nama']    ?? '');
    $email   = trim($_POST['email']   ?? '');
    $pesan   = trim($_POST['pesan']   ?? '');

    if ($nama && $email && $pesan && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Di sini bisa dihubungkan ke email / database pesan
        $success = true;
    } else {
        $error = "Mohon isi semua field dengan benar.";
    }
}

require_once 'layout/web_header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center g-4">

        <!-- Form Kontak -->
        <div class="col-lg-6">
            <div class="card border shadow-sm bg-white rounded-4">
                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <div class="bg-dark text-white rounded-circle d-inline-flex justify-content-center align-items-center mb-3 shadow-sm" style="width:60px; height:60px;">
                            <i class="bi bi-envelope fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Hubungi Kami</h3>
                        <p class="text-secondary small">Kami siap membantu pertanyaan Anda</p>
                    </div>

                    <?php if ($success): ?>
                    <div class="alert alert-success rounded-3">
                        <i class="bi bi-check-circle me-2"></i>
                        Pesan terkirim! Kami akan menghubungi Anda segera.
                    </div>
                    <?php endif; ?>

                    <?php if ($error): ?>
                    <div class="alert alert-danger rounded-3"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="nama" name="nama"
                                   placeholder="Nama" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>" required>
                            <label for="nama"><i class="bi bi-person me-2"></i>Nama Lengkap</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="email" name="email"
                                   placeholder="Email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                            <label for="email"><i class="bi bi-envelope me-2"></i>Alamat Email</label>
                        </div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control rounded-3" id="pesan" name="pesan"
                                      placeholder="Pesan" style="height:120px;" required><?= htmlspecialchars($_POST['pesan'] ?? '') ?></textarea>
                            <label for="pesan"><i class="bi bi-chat-left-text me-2"></i>Pesan</label>
                        </div>

                        <button class="btn btn-dark w-100 py-3 rounded-pill fw-bold text-white shadow-sm" type="submit">
                            <i class="bi bi-send me-2"></i>Kirim Pesan
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <!-- Info Kontak -->
        <div class="col-lg-4">
            <div class="card border shadow-sm bg-white rounded-4 h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4"><i class="bi bi-geo-alt-fill text-dark me-2"></i>Informasi Kontak</h5>

                    <div class="d-flex flex-column gap-4">
                        <?php
                        $info = [
                            ['icon' => 'bi-map',        'label' => 'Alamat',    'value' => 'Jl. Sudirman No. 88, Jakarta Pusat 10220'],
                            ['icon' => 'bi-telephone',  'label' => 'Telepon',   'value' => '(021) 8888-9999'],
                            ['icon' => 'bi-whatsapp',   'label' => 'WhatsApp',  'value' => '+62 812-3456-7890'],
                            ['icon' => 'bi-envelope',   'label' => 'Email',     'value' => 'hello@parfumerie.id'],
                            ['icon' => 'bi-clock',      'label' => 'Jam Buka',  'value' => 'Senin – Sabtu, 09.00 – 21.00'],
                        ];
                        foreach ($info as $item):
                        ?>
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-light border text-dark rounded-3 d-flex justify-content-center align-items-center flex-shrink-0" style="width:40px; height:40px;">
                                <i class="bi <?= $item['icon'] ?>"></i>
                            </div>
                            <div>
                                <div class="text-secondary small"><?= $item['label'] ?></div>
                                <div class="fw-semibold"><?= $item['value'] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php require_once 'layout/web_footer.php'; ?>
