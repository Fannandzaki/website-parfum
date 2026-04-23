<?php require_once 'layout/web_header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Header -->
            <div class="text-center mb-5">
                <div class="bg-dark text-white rounded-circle d-inline-flex justify-content-center align-items-center mb-3 shadow-sm" style="width:70px; height:70px;">
                    <i class="bi bi-info-circle fs-2"></i>
                </div>
                <h3 class="fw-bold">Tentang Parfumerie</h3>
                <p class="text-secondary">Nan Company &mdash; Toko Parfum Premium</p>
            </div>

            <!-- About Card -->
            <div class="card border shadow-sm bg-white rounded-4 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-building text-dark me-2"></i>Siapa Kami</h5>
                    <p class="text-secondary">
                        <strong>Parfumerie</strong> adalah toko parfum premium yang beroperasi di bawah naungan 
                        <strong>Nan Company</strong>. Kami menghadirkan koleksi parfum original dari brand-brand 
                        ternama dunia seperti Chanel, Dior, Tom Ford, dan masih banyak lagi.
                    </p>
                    <p class="text-secondary mb-0">
                        Berdiri sejak 2015, kami telah melayani ribuan pelanggan di seluruh Indonesia dengan komitmen 
                        penuh terhadap keaslian produk dan kepuasan pelanggan.
                    </p>
                </div>
            </div>

            <!-- Visi Misi -->
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="card h-100 border shadow-sm bg-white rounded-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3"><i class="bi bi-eye text-dark me-2"></i>Visi</h5>
                            <p class="text-secondary mb-0">
                                Menjadi toko parfum premium terpercaya nomor satu di Indonesia yang dikenal 
                                atas keaslian produk dan pelayanan terbaik.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border shadow-sm bg-white rounded-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3"><i class="bi bi-bullseye text-dark me-2"></i>Misi</h5>
                            <ul class="text-secondary mb-0 ps-3">
                                <li>Menjual hanya parfum 100% original</li>
                                <li>Memberikan pelayanan yang ramah</li>
                                <li>Harga terjangkau dan kompetitif</li>
                                <li>Pengiriman cepat ke seluruh Indonesia</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Keunggulan -->
            <div class="card border shadow-sm bg-white rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4"><i class="bi bi-star-fill text-dark me-2"></i>Mengapa Memilih Kami</h5>
                    <div class="row g-3">
                        <?php
                        $keunggulan = [
                            ['icon' => 'bi-shield-check',   'judul' => '100% Original',      'desc' => 'Semua produk dijamin keasliannya'],
                            ['icon' => 'bi-truck',           'judul' => 'Pengiriman Cepat',   'desc' => 'Ke seluruh Indonesia dalam 2-5 hari'],
                            ['icon' => 'bi-headset',         'judul' => 'CS Ramah',           'desc' => 'Siap membantu 7 hari seminggu'],
                            ['icon' => 'bi-arrow-clockwise', 'judul' => 'Easy Return',        'desc' => 'Garansi retur 7 hari'],
                        ];
                        foreach ($keunggulan as $k):
                        ?>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-light border text-dark rounded-3 d-flex justify-content-center align-items-center flex-shrink-0" style="width:40px; height:40px;">
                                    <i class="bi <?= $k['icon'] ?>"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold"><?= $k['judul'] ?></div>
                                    <div class="text-secondary small"><?= $k['desc'] ?></div>
                                </div>
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
