<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("location: login.php");
    exit;
}

$url = 'https://wallpaperaccess.com/full/1884665.jpg';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Add Buku Page</title>
        <style>
        body {
            background-image: url('<?php echo $url ?>');
        }
        </style>

    </head>

    <body>
        <div>
            <div class="container mt-5 d-flex justify-content-center">
                <div class="card text-white bg-dark ma-5 shadow " style="min-width:40rem;">
                    <div class="card-header fw-bold" style="font-size: 25px;">Tambah Buku</div>
                    <div class="card-body">
                        <form action="addBukuPro.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="exampleInputJudulBuku" class="form-label" style="font-size: 20px;">Judul
                                    Buku</label>
                                <input type="text" class="form-control" name="judul" placeholder="Masukan Judul Buku"
                                    autocomplete="off">
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputJumlahBuku" class="form-label" style="font-size: 20px;">Jumlah
                                    Buku</label>
                                <input type="Number" class="form-control" name="jumlah"
                                    placeholder="Masukan Jumlah Buku" autocomplete="off">
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputGambarSampul" class="form-label" style="font-size: 20px;">Gambar
                                    Sampul</label>
                                <input type="file" class="form-control" name="sampul" value="" autocomplete="off" />
                            </div>
                            <div class="d-grid gap-2">
                                <button style="background-color:black; border-radius: 20px; border-color: black;"
                                    type="submit" class="btn btn-primary" name="addBuku">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>