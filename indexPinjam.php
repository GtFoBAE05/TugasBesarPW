<?php
session_start();
require 'db.php';

if (!isset($_SESSION['isLogin'])) {
    header("location: login.php");
    exit;
}

$idUser = $_SESSION['id'];
$statusbuku = show("SELECT * FROM statusbuku WHERE idUser='$idUser'");

echo $_SESSION["id"];
?>

<!doctype html>
<html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="script.js"></script>

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <!-- FontAwesome 6.2.0 CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- (Optional) Use CSS or JS implementation -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
            integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                    <a class="navbar-brand" href="#">Navbar</a>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="indexPinjam.php">pinjam</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="updateProfil.php">update profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <h1>Halaman peminjaman</h1>
            <form action="" method="get">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama buku</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal pengembalian</th>
                            <th scope="col">Pengembalian buku</th>

                        </tr>
                    </thead>

                    <?php foreach ($statusbuku as $sb): ?>
                    <?php $b = showById($sb['idBuku'])?>
                    <tr>
                        <td><?php echo $b['namaBuku']; ?></td>
                        <td><img src="img/<?php echo $b["gambarBuku"]; ?>" width="70"></td>
                        <td><?php echo $sb['statusBuku']; ?></td>
                        <td><?php echo $sb['tanggal']; ?></td>
                        <td>
                            <?php if ($sb['statusBuku'] == "dipinjam"): ?>
                            <button name="kembaliBuku"><a onClick="return confirm('yakin ingin kembalikan?')"
                                    href="kembaliBuku.php?id=<?php echo $sb['id']; ?>&idBuku=<?php echo $b['idBuku']; ?> ">kembalikan
                                    buku</a>
                                <script>
                                if (kembaliBuku == true);
                                </script>
                            </button>
                            <?php else: ?>
                            buku telah dikembalikan
                            <?php endif?>
                        </td>
                    </tr>

                    <?php endforeach;?>


                </table>
            </form>
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