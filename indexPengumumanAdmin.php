<?php
include 'Sidebar.php';

$pengumuman = getPengumuman();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pengumuman</title>
        <style>
        img {
            width: 100px;
        }
        </style>
    </head>

    <body>
        <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid #141414; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="body d-flex justify-content-between">
                <h2>Pengumuman</h2>
                <a href="addPengumuman.php">
                    <button class="btn"><i style="color: black" class="fa fa-plus fa-2x"></i></button>
                </a>
            </div>
            <hr>
            <form action="" method="get">
                <table class="table" style="font-size: 20px; text-align: center;">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Konten</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        <?php foreach ($pengumuman as $p): ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $p['judul']; ?></td>
                            <td><?php echo $p['konten']; ?></td>
                            <td><button type="button" class="btn btn-primary"><a
                                        href="updatePengumumanAdmin.php?id=<?php echo $p['id'] ?>">Ubah</a></button>
                            </td>
                            <td><button type="button" class="btn btn-warning"><a
                                        href="hapusPengumuman.php?id=<?php echo $p['id'] ?>">Hapus</a></button>
                            </td>
                        </tr>
                        <?php $no++?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </form>

        </div>
    </body>

</html>