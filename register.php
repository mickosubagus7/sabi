<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNAPWISE</title>
    <link rel="icon" href="assets/img/bk.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <style>
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
        font-weight: bold;
        font-size: 24px;
        color: black;
        /* Warna teks untuk kontras dengan gambar latar belakang */
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="display: flex; align-items: center;">
                <img src="assets/img/bk.png" alt="SNAPWISE Logo" style="height: 100%; width: 10%; margin-right: 10px;">
                SNAPWISE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNav">
                <div class="navbar me-auto">

                </div>
                <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
                <a href="login.php" class="btn btn-outline-success m-1">Login</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class="text-center">
                            <h5>Daftar Akun Baru</h5>
                        </div>
                        <form action="config/aksi_register.php" method="post">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    <span class="input-group-text" id="togglePassword"
                                        onclick="togglePasswordVisibility()">
                                        <i id="passwordIcon" class="far fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <label class="form-label">email</label>
                            <input type="email" name="email" class="form-control" required>
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control" required>
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                            <div class="d-grid mt-2">
                                <button class="btn btn-primary" type="submit" name="kirim">Daftar</button>
                            </div>
                        </form>
                        <hr>
                        <p>Sudah punya akun <a href="login.php">Login disini</a></p>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var passwordIcon = document.getElementById("passwordIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.className = "far fa-eye-slash"; // Ubah ikon menjadi 'eye-slash' saat menampilkan password
        } else {
            passwordInput.type = "password";
            passwordIcon.className = "far fa-eye"; // Ubah ikon menjadi 'eye' saat menyembunyikan password
        }
    }
    </script>



    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; UKK RPL 2024 | Micko Subagus</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>