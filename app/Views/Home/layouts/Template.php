<!-- Connection to css n js -->
<link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.min.js') ?>"></script>


<!-- Head -->
<?= $this->include(($head ?? '') == 'login' ? 'home/layouts/head-login' : 'home/layouts/head'); ?>

<!-- navbar -->
<?php echo $this->include('home/layouts/navbar'); ?>

<!-- header -->
<?php
if ($title == 'Home') {
    echo $this->include('home/layouts/header-home');
} elseif ($title == "Login" || $title == "Register") {

} else {
    echo $this->include('home/layouts/header');
}
?>

<!-- Isi konten halaman -->
<?= $this->renderSection('content'); ?>

<!-- Footer -->
<?= $this->include('home/layouts/footer'); ?>