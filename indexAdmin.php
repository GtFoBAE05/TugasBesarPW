<?php
include 'Sidebar.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
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
            <h2>Data Buku</h2>
            <a href="AddBuku.php?idbuku='.$data['idbuku'].'">
                <button class="btn"><i style="color: black" class="fa fa-plus fa-2x"></i></button>
            </a>
        </div>
        <hr>
        <table class="table" style="font-size: 20px; text-align: center;">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">Jumlah Tersedia</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Hapus</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = mysqli_query($con,"SELECT * FROM buku") or
                    die(mysqli_error($con));
                if(mysqli_num_rows($query)==0){
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                } else{
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                        echo '
                    <tr>
                    <th scope="row">'.$no.'</th>
                    <td>'.$data['namaBuku'].'</td>
                    <td><img src="img/'.$data['gambarBuku'].'" style = "widht:150px; height:100px;"></td>
                    <td>'.$data['jumlahTersedia'].'</td>
                    <td>
                        <a href="EditBuku.php?idbuku='.$data['idBuku'].'">
                            <button class="btn"><i style="color: blue" class="fa fa-pencil-square fa-3x"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="deleteBukuPro.php?idbuku='.$data['idBuku'].'" onClick="return confirm ( \'Are you sure want to delete this data?\')">
                            <button class="btn"><i style="color: red" class="fa fa-trash-o fa-3x"></i></button>
                        </a>
                    </td>
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