<?php 
include 'Sidebar.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjam</title>
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
            <h2>Data Peminjam</h2>
        </div>
        <hr>
        <table class="table" style="font-size: 20px; text-align: center;">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Buku</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = mysqli_query($con,"SELECT B.namaBuku, B.gambarBuku, U.username, S.tanggal 
                FROM buku AS B INNER JOIN statusbuku AS S ON B.idBuku = S.idBuku INNER JOIN
                users AS U ON U.id = S.id WHERE S.statusBuku ='dipinjam'") or
                    die(mysqli_error($con));
                if(mysqli_num_rows($query)==0){
                    echo '<tr> <td colspan="7">Belum ada buku yang dipinjam</td> </tr>';
                } else{
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                        echo '
                    <tr>
                    <th scope="row">'.$no.'</th>
                    <td style="font-size: 22px;">'.$data['namaBuku'].'
                        <div class="mb-3" style="padding-top: 10px;">
                            <img src="img/'.$data['gambarBuku'].'" style = "widht:150px; height:100px;">
                        </div>
                    </td>
                    <td>'.$data['username'].'</td>
                    <td>'.$data['tanggal'].'</td>
                    </tr>';
                    $no++;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>