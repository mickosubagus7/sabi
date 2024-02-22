<!-- config/aksi_username.php -->

<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_SESSION['userid'];
    $new_username = $_POST['new_username'];

    // Periksa apakah username baru sudah digunakan oleh pengguna lain
    $check_username_query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$new_username' AND userid != '$userid'");
    if (mysqli_num_rows($check_username_query) > 0) {
        echo 'Username sudah digunakan. Pilih username lain.';
    } else {
        // Update username di database
        mysqli_query($koneksi, "UPDATE user SET username = '$new_username' WHERE userid = '$userid'");
        echo "<script>
        alert('Username berhasil diganti');
        location.href='../admin/profile.php';
        </script>";
    }
}
?>
