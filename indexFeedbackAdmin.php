<?php
include 'Sidebar.php';

$feedback = getFeedback();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Feedback</title>
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
                <h2>Kritik&Saran</h2>
            </div>
            <hr>

            <form action="" method="GET">
                <table class="table" style="font-size: 20px; text-align: center;">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kritik</th>
                            <th scope="col">Saran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        <?php foreach ($feedback as $f): ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $f['kritik'] ?></td>
                            <td><?php echo $f['saran'] ?></td>

                            <?php if ($f['status'] === "belum dibaca"): ?>
                            <td><button type="button" class="btn btn-success"><a
                                        href="ubahStatusFeedback.php?id=<?php echo $f['id'] ?>">Telah
                                        dibaca?</a></button></td>
                            <?php else: ?>
                            <td>Sudah dibaca</td>
                            <?php endif;?>

                            <td><button type="button" class="btn btn-warning"><a
                                        href="hapusFeedback.php?id=<?php echo $f['id'] ?>">Hapus</a></button>
                            </td>

                        </tr>
                        <?php $no++;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </form>


        </div>
    </body>

</html>