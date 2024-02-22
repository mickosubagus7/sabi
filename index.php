<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNAPWISE</title>
    <link rel="icon" href="assets/img/bk.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <style>
    link {
        display: none;
    }

    .custom-btn {
        color: white;
        /* Warna teks */
        background-color: rgba(0, 0, 0, 0.5);
        /* Warna latar belakang dengan opacity */
        border-color: white;
        /* Warna garis pinggir */
    }

    .custom-btn:hover {
        color: #333;
        /* Warna teks saat hover */
        background-color: rgba(255, 255, 255, 0.8);
        /* Warna latar belakang saat hover dengan opacity */
        border-color: #333;
        /* Warna garis pinggir saat hover */
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

    body {
        background-image: url('assets/img/keos.jpg');
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

    nav {
        margin-bottom: auto;
        /* Memungkinkan navbar mengambil sebanyak mungkin tinggi yang diperlukan */
        background-image: url('path/to/your/image.jpg');
        /* Ganti path/to/your/image.jpg dengan path gambar Anda */
        background-size: cover;
        background-position: center;
        padding: 20px;
        /* Sesuaikan sesuai kebutuhan */
        color: #ffffff;
        /* Warna teks untuk kontras dengan gambar latar belakang */
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 24px;
        color: white;
        /* Warna teks untuk kontras dengan gambar latar belakang */
    }

    .navbar-toggler {
        border: 2px solid #ffffff;
        /* Warna garis toggler untuk kontras dengan gambar latar belakang */
    }

    .navbar-nav {
        margin-left: auto;
    }

    footer {
        margin-top: auto;
        /* Memungkinkan footer mengambil sebanyak mungkin tinggi yang diperlukan */
    }

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
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Navbar brand with image -->
            <a class="navbar-brand" href="index.php" style="display: flex; align-items: center;">
                <img src="assets/img/bk.png" alt="SNAPWISE Logo" style="height: 100%; width: 10%; margin-right: 10px;">
                SNAPWISE
            </a>

            <!-- Navbar toggler button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse mt-2" id="navbarNav">
                <div class="navbar me-auto"></div>
                <a href="register.php" class="btn btn-outline-primary m-1 custom-btn">Daftar</a>
                <a href="login.php" class="btn btn-outline-success m-1 custom-btn">Login</a>
            </div>
        </div>
    </nav>


    <!-- Konten Anda disini -->

    <!-- Konten Anda disini -->
    <div id="content-container" class="text-center"
        style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; margin: 20px; opacity: 0;">
        <h2 style="color: #333;">Buat kenangan bersama teman, keluarga, atau kerabat di sini</h2>
        <p style="font-size: 18px; color: #555;">Jelajahi momen indah melalui galeri foto kami.</p>
        <a href="login.php" class="btn btn-primary btn-lg d-block mx-auto mt-3">Lihat Galeri</a>
    </div>

    <script>
    // JavaScript to add fadeIn animation
    document.addEventListener("DOMContentLoaded", function() {
        var contentContainer = document.getElementById("content-container");
        contentContainer.style.animation = "fadeIn 1s ease-out";
        contentContainer.style.opacity = "1";
    });
    </script>




    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>