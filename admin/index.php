<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda harus login!');
    location.href='../index.php';
    </script>";
}
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
            /* Menghapus margin default body */
            min-height: 100vh;
            /* Memastikan tinggi minimum 100vh */
            display: flex;
            flex-direction: column;
        }

        .navbar-brand {
            font-family: 'Your Preferred Font', Georgia, 'Times New Roman', Times, serif;
            /* Replace 'Your Preferred Font' with the font you want to use */
            font-size: 20px;
            /* Adjust the font size as needed */
            font-weight: bold;
            /* You can adjust the font weight (normal, bold, etc.) */
            color: #333;
            /* Set the desired text color */
            text-decoration: none;
            /* Remove underline from the link */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Beranda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <a href="home.php" class="btn btn-outline-black m-1" style="margin-left: 20px">
                        <i class="fas fa-book"></i> Koleksi
                    </a>
                    <a href="album.php" class="btn btn-outline-black m-1" style="margin-left: 20px">
                        <i class="fas fa-images"></i> Album
                    </a>
                    <a href="foto.php" class="btn btn-outline-black m-1" style="margin-left: 20px;">
                        <i class="fas fa-camera"></i> Foto
                    </a>
                    <a href="profile.php" class="btn btn-outline-black m-1" style="margin-left: 20px;">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    </a>
                    <a href="tutorial.php" class="btn btn-outline-black m-1" style="margin-left: 20px;">
                        <i class="fas fa-info-circle"></i> Tutorial Penggunaan
                    </a>



                </ul>
                <div class="logout-container">
                    <?php
                    if ($_SESSION['status'] == 'login') {
                        // Tampilkan nama pengguna jika sudah login dengan warna teks hitam
                        echo '<span class="text-black" style="color: black;">😎 Selamat datang, ' . $_SESSION['namalengkap'] . '!</span>';
                        echo '<a href="../config/aksi_logout.php" class="btn btn-outline-black m-1">
        <i class="fas fa-sign-out-alt"></i> 
      </a>';
                    } else {
                        // Jika belum login, tampilkan tombol login
                        echo '<a href="../index.php" class="btn btn-outline-primary m-1">login</a>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </nav>




    <div class="container mt-2">
        <div class="row">
            <?php

            $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album on foto.albumid=album.albumid");
            while ($data = mysqli_fetch_array($query)) {
            ?>

                <div class="col-md-3">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">

                        <div class="card mb-2">
                            <img src="../assets/img/<?php echo
                                                    $data['lokasifile'] ?>" class="card-img-top" title="<?php echo
                                                                                                        $data['judulfoto'] ?>" style="height: 12rem;">



                            <div class="card-footer text-center">
                                <?php
                                $fotoid = $data['fotoid'];
                                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");

                                if (mysqli_num_rows($ceksuka) == 1) { ?>
                                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka">
                                        <i class="fa fa-heart" style="color: red;"></i>
                                    </a>
                                <?php } else { ?>
                                    <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka">
                                        <i class="fa-regular fa-heart" style="color: black;"></i>
                                    </a>
                                <?php }

                                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                $jumlah_like = mysqli_num_rows($like);

                                // Menampilkan siapa saja yang telah melakukan like
                                if ($jumlah_like > 0) {
                                    echo $jumlah_like . ' suka by: ';
                                    $query_like_users = mysqli_query($koneksi, "SELECT user.namalengkap FROM likefoto INNER JOIN user ON likefoto.userid=user.userid WHERE likefoto.fotoid='$fotoid'");
                                    $users = array();
                                    while ($row_user = mysqli_fetch_assoc($query_like_users)) {
                                        $users[] = $row_user['namalengkap'];
                                    }
                                    echo implode(', ', $users);
                                } else {
                                    echo '0 suka';
                                }
                                ?>
                                <a href="a" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
                                    <i class="fa-regular fa-comment" style="color: black;"></i>
                                </a>

                                <?php
                                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                                echo mysqli_num_rows($jmlkomen) . ' Komentar';
                                ?>
                            </div>




                        </div>
                    </a>

                    <!-- modal -->

                    <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <img src="../assets/img/<?php echo
                                                                    $data['lokasifile'] ?>" class="card-img-top" title="<?php echo
                                                                                                                        $data['judulfoto'] ?>">

                                        </div>
                                        <div class="col-md-4">
                                            <div class="m-2">
                                                <div class="overflow-auto">
                                                    <div class="sticky-top">
                                                        <strong> <?php echo $data['judulfoto'] ?>
                                                        </strong> <br>
                                                        <span class="badge bg-success"><?php echo $data['namalengkap'] ?></span>
                                                        <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                                                        <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
                                                    </div>
                                                    <hr>
                                                    <p align="left"><?php echo $data['deskripsifoto'] ?></p>
                                                    <hr>

                                                    <?php
                                                    $fotoid = $data['fotoid'];
                                                    $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                                    while ($row = mysqli_fetch_array($komentar)) {
                                                    ?>
                                                        <p align="left">
                                                            <strong><?php echo $row['namalengkap'] ?></strong>
                                                            <?php echo $row['isikomentar'] ?>

                                                            <!-- Tambahkan tombol hapus dengan link ke file proses_hapus_komentar.php -->
                                                            <?php
                                                            // Tautan hanya ditampilkan jika user yang sedang login adalah pemilik komentar
                                                            if ($row['userid'] == $_SESSION['userid']) {
                                                            ?>
                                                                <a href="../config/proses_hapus_komentar.php?komentarid=<?php echo $row['komentarid']; ?>" class="btn btn-outline-black btn-sm">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                    <!-- Ganti dengan ikon yang diinginkan -->
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </p>
                                                    <?php } ?>
                                                    <hr>

                                                    <div class="sticky-bottom">
                                                        <form action="../config/proses_komentar.php" method="post">
                                                            <div class="input-group">
                                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar" required>
                                                                <div class="input-group-prepend">
                                                                    <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            <?php } ?>
        </div>
    </div>


    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

</body>

</html>