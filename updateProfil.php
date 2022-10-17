<?php
session_start();

if (!isset($_SESSION['isLogin'])) {
    header("location: login.php");
    exit;
}

include 'db.php';

$user = showUserById($_SESSION['id']);

if (isset($_POST['submit'])) {
    if (updateUser($_POST['submit'], $_SESSION['id'])) {
        echo
            '<script>
                alert("Berhasil update profil");
                window.location = "./index.php"
                </script>';
    } else {
        echo
            '<script>
                alert("Gagal update profil");
                window.location = "./index.php"
                </script>';
    }
}

?>

<!doctype html>
<html lang="en">

    <head>
        <title>Update Profil</title>
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
                                <a class="nav-link active" href="updateProfil.php">Update Profil</a>
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
            <div class="m-2">
                <h1>Update Profile</h1>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="username" class="form-label">Nama</label>
                        <input class="form-control" id="username" name="username" aria-describedby="emailHelp"
                            value="<?php echo $user['username'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" id="email" name="email" aria-describedby="emailHelp"
                            value="<?php echo $user['email'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto (JPG, JPEG, PNG atau GIF)</label>
                        <br>
                        <br>
                        foto lama: <img src="img/<?php echo $user['foto'] ?>" alt="" width="100px">
                        <br>
                        <br>
                        <input type="file" name="foto" id="foto">
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="submit">Update Profile</button>
                    </div>
                </form>
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