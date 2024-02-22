<?php
session_start();
include 'koneksi.php';

if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda harus login!');
    location.href='../index.php';
    </script>";
    exit(); // Tambahkan exit untuk menghentikan eksekusi jika tidak ada session login
}

if (isset($_GET['komentarid'])) {
    $komentarid = $_GET['komentarid'];

    // Lakukan query penghapusan komentar berdasarkan komentarid
    $query = mysqli_query($koneksi, "DELETE FROM komentarfoto WHERE komentarid='$komentarid'");

    if ($query) {
        echo "<script>
        alert('Komentar berhasil dihapus');
        location.href='../admin/index.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menghapus komentar');
        history.go(-1);
        </script>";
    }
} else {
    echo "<script>
    alert('Parameter komentarid tidak ditemukan');
    history.go(-1);
    </script>";
}
?>