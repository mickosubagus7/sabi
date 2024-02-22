<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login!');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    /* animasui */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .card {
        animation: fadeIn 1s ease-out;
    }

    .navbar-brand {
        font-family: 'Your Preferred Font', Georgia, 'Times New Roman', Times, serif;

        font-size: 20px;

        font-weight: bold;

        color: #333;

        text-decoration: none;

    }
    </style>

</head>

<body>

    <!-- Bagian Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Beranda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNav">
                <div class="navbar mx-auto">
                    <a href="home.php" class="btn btn-outline-black m-1" style="margin-left: 20px">
                        <i class="fas fa-book"></i> Koleksi
                    </a>
                    <a href="album.php" class="btn btn-outline-black m-1" style="margin-left: 20px">
                        <i class="fas fa-photo-video"></i> Album
                    </a>
                    <a href="foto.php" class="btn btn-outline-black m-1" style="margin-left: 20px;">
                        <i class="fas fa-image"></i> Foto
                    </a>
                    <a href="profile.php" class="btn btn-outline-black m-1" style="margin-left: 20px;">
                        <i class="fas fa-user"></i> Profile
                    </a>


                </div>
                <a href="../config/aksi_logout.php" class="btn btn-outline-black m-1">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Bagian Tambah Foto -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Foto </div>
                    <div class="card-body">
                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judulfoto" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsifoto" required></textarea>
                            <label class="form-label">Album</label>
                            <select class="form-control" name="albumid" required>
                                <?php
                                $userid = $_SESSION['userid'];
                                $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                                <option value="<?php echo $data_album['albumid'] ?>">
                                    <?php echo $data_album['namaalbum'] ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label">File</label>
                            <input type="file" class="form-control" name="lokasifile" required>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Galeri Foto</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Judul Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td> <?php echo $no++ ?></td>
                                    <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100"></td>
                                    <td> <?php echo $data['judulfoto'] ?> </td>
                                    <td> <?php echo $data['deskripsifoto'] ?> </td>
                                    <td> <?php echo $data['tanggalunggah'] ?></td>
                                    <td>
                                        <!-- Button trigger modal edit-->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit<?php echo $data['fotoid'] ?>">
                                            Edit
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="../config/aksi_foto.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <input type="hidden" name="fotoid"
                                                                value="<?php echo $data['fotoid'] ?>">
                                                            <label class="form-label">Judul Foto</label>
                                                            <input type="text" name="judulfoto"
                                                                value="<?php echo $data['judulfoto'] ?>"
                                                                class="form-control" required>
                                                            <label class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" name="deskripsifoto"
                                                                required><?php echo $data['deskripsifoto']; ?>
                                                        </textarea>
                                                            <label class="form-label">Album</label>
                                                            <select class="form-control" name="albumid">
                                                                <?php
                                                                    $userid = $_SESSION['userid'];
                                                                    $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                                                    while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                                                                <option
                                                                    <?php if ($data_album['albumid'] == $data['albumid']) { ?>
                                                                    selected="selected" <?php } ?>
                                                                    value="<?php echo $data_album['albumid'] ?>">
                                                                    <?php echo $data_album['namaalbum'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label class="form-label">Foto</label>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <img src="../assets/img/<?php echo $data['lokasifile'] ?>"
                                                                        width="100">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <label class="form-label">Ganti File</label>
                                                                    <input type="file" class="form-control"
                                                                        name="lokasifile">
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit" name="edit" class="btn btn-primary">Edit
                                                            Data
                                                        </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    </div>
                    <!-- End Edit -->

                    <!-- Button trigger modal hapus -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#hapus<?php echo $data['fotoid'] ?>">
                        Hapus
                    </button>

                    <!-- Modal  Hapus-->
                    <div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../config/aksi_foto.php" method="POST">
                                        <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                        Apakah anda yakin akan menghapus data <strong><?php echo $data['judulfoto'] ?>
                                            </php></strong> ?

                                </div>
                                <div class="modal-footer">

                                    <button type="submit" name="hapus" class="btn btn-primary">Hapus
                                        Data
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Hapus -->

                </td>
                </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- End foto -->


    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

</body>

</html>