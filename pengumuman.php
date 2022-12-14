<?php
session_start();

if (!isset($_SESSION['isLogin'])) {
    header("location: login.php");
    exit;
}

include 'db.php';

$pengumuman = getPengumuman();

?>

<!doctype html>
<html lang="en">

    <head>
        <title>Pengumuman</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#">Tugas Besar Pemrograman Web</a>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="indexPinjam.php">Pinjam Buku</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="updateProfil.php">Update Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="feedback.php">Kritik&Saran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="pengumuman.php">pengumuman</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="m-2 position-absolute top-50 start-50 translate-middle">

                <?php if ($pengumuman == 0): ?>

                <h1>Belum ada pengumuman saat ini. Silahkan periksa lagi nanti...</h1>

                <?php else: ?>

                <?php foreach ($pengumuman as $p): ?>
                <div class="card text-dark bg-light mb-3" style="max-width: 50 rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $p['judul'] ?></h5>
                        <p class="card-text"><?php echo $p['konten'] ?></p>
                    </div>
                </div>
                <?php endforeach;?>


                <?php endif;?>


            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
    </body>

</html>