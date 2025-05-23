<?= $this->extend('layouts/dashboard/template-dashboard'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
     <?php
            // ubah variabel $nama sesuai dengan variable dibawah jika hanya mengambil dashboard saja
            $nama_pengguna = "Kawan Koding";
        ?>
        <div class="alert alert-success shadow-sm p-4" role="alert">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <i class="bi bi-person-check-fill me-3" style="font-size: 2rem;"></i>
                </div>
                <div class="flex-grow-1">
                    <h4 class="alert-heading">Halo kembali, <?= htmlspecialchars($nama) ?>!</h4>
                    <p>Selamat menikmati hari Jumat Anda yang cerah di Banjarbaru. Kami senang Anda bergabung kembali bersama kami.</p>
                    <hr>
                    <p class="mb-0">Jangan ragu untuk menjelajahi fitur-fitur terbaru yang telah kami siapkan untuk Anda.</p>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>