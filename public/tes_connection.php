<?php
// Pengaturan koneksi - sesuaikan jika perlu
$host = '127.0.0.1';
$user = 'root';
$pass = ''; // Kosongkan jika tidak ada password
$db   = 'codeigniter'; // Pastikan nama ini sama persis dengan di phpMyAdmin
$port = 3306; // Pastikan ini port yang benar dari XAMPP

// Mencoba membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

// Memeriksa hasil koneksi
if (!$koneksi) {
    // Jika gagal, tampilkan pesan error yang jelas
    die("<h1>Koneksi GAGAL!</h1><p>Pesan Error dari PHP: " . mysqli_connect_error() . "</p><p>Ini artinya masalah ada pada instalasi XAMPP/MySQL Anda, bukan pada CodeIgniter.</p>");
}

// Jika berhasil
echo "<h1>Selamat! Koneksi ke database BERHASIL!</h1>";
echo "<p>Ini artinya, pengaturan XAMPP dan MySQL Anda sudah benar. Masalahnya mungkin ada di konfigurasi CodeIgniter.</p>";

mysqli_close($koneksi);
?>