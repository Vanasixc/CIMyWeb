<?= $this->extend('dashboard/layouts/template-dashboard'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid pt-4">
    <div class="welcome-card">
        <div class="welcome-card-icon-area">
            <i class="bi bi-person-check-fill"></i>
        </div>
        <div class="welcome-card-content text-center">
            <h2 class="fw-bold">Welcome, <?= session()->get('nama') ?>!</h2>
            <p class="lead" style="font-size: 1.1rem;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit deserunt suscipit neque tenetur sunt tempora?
            </p>
            <hr class="my-3">
            <div id="waktu-sekarang">
                <div id="tanggal-live"></div>
                <div id="jam-live"></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>