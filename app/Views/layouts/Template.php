<!-- Connection to css n js -->
<link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.min.js') ?>"></script>

<!-- navbar -->
<?php echo $this->include('layouts/navbar'); ?>

<!-- Head -->
<?= $this->include(($head ?? '') == 'login' ? 'layouts/head-login' : 'layouts/head'); ?>

<!-- header -->
<?php
if ($title == 'Home') {
    echo $this->include('layouts/header-home');
} elseif ($title == "Login") {

} else {
    echo $this->include('layouts/header');
}
?>

<!-- Isi konten halaman -->
<?= $this->renderSection('content'); ?>

<!-- Footer -->
<?= $this->include('layouts/footer'); ?>