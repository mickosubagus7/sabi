<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';

// Pastikan user sudah login
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda harus login!');
    location.href='../index.php';
    </script>";
}

// Ambil data pengguna dari database
$user_query = mysqli_query($koneksi, "SELECT * FROM user WHERE userid = '$userid'");
$user_data = mysqli_fetch_assoc($user_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNAPWISE</title>
    <link rel="icon" href="../assets/img/bk.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-GLhlTQ8iS13djIYPTLVveaXF8rRSq1q62BRi1SHtFfRHp5epJGu3Nnvm1I8aI" crossorigin="anonymous">


    <style>
    body {
        background-image: url('../assets/img/.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        margin: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .navbar-brand {
        font-family: 'Your Preferred Font', Georgia, 'Times New Roman', Times, serif;
        font-size: 20px;
        font-weight: bold;
        color: #333;
        text-decoration: none;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    h2 {
        color: #333;
    }

    form {
        max-width: 400px;
        margin: 20px auto;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    a {
        color: #007bff;
        text-decoration: none;
        margin-top: 10px;
        display: inline-block;
    }

    a:hover {
        text-decoration: underline;
    }
    </style>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Beranda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNav">
            </div>
            <a href="../config/aksi_logout.php" class="btn btn-outline-black m-1">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </nav>

 <!-- ... (Bagian-bagian lainnya) ... -->

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <?php
            if ($_SESSION['status'] == 'login') {
                echo '<h2>Profil Pengguna</h2>';
                echo '<div class="profile-info">';
                echo '<p><strong>Username:</strong> ' . $user_data['username'] . '</p>';
                echo '<p><strong>Nama Lengkap:</strong> ' . $user_data['namalengkap'] . '</p>';
                echo '</div>';
                echo '<form method="post" action="../config/aksi_username.php">';
                echo '<label for="new_username">Ganti Username:</label>';
                echo '<input type="text" name="new_username" class="form-control" required>';
                echo '<button type="submit" class="btn btn-primary">Simpan Perubahan</button>';
                echo '</form>';
                echo '<p><strong>Password:</strong> ****</p>';
                echo '<a href="../config/ubah_password.php" class="btn btn-secondary">Ubah Password</a>';
            } else {
                echo '<p>Anda belum login.</p>';
                echo '<a href="../index.php" class="btn btn-outline-primary">Login</a>';
            }
            ?>
        </div>
    </div>
</div>

<!-- ... (Bagian-bagian lainnya) ... -->


    <!-- Script Bootstrap -->
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
