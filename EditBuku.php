<?php
    include 'Sidebar.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #141414; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);">
    <h4>Edit Buku</h4>
    <hr>
    <div class="countainer card-content w-50">
        <form action="editBukuPro.php" method="POST" enctype="multipart/form-data">
            <?php
            if(isset($_GET['idbuku'])){
                $id = $_GET['idbuku'];
                $sql="SELECT * FROM buku WHERE idBuku=$id";
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                if($result) {
                        if(mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);   
                        $id = $row['idBuku'];
                        $judul = $row['namaBuku'];
                        $sampul = $row['gambarBuku'];
                        $jumlah = $row['jumlahTersedia'];
                        }
                    }
                }
            ?>
            <table style="width: 100%;">
                <div><input type="text" name="idbuku" hidden value="<?php echo $id?>"></div>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="titleInput" class="form-label">Judul</label>
                            <input type="text" class="form-control w-100" name="judul" width="100%" autocomplete="off"
                                value="<?php echo $judul ?>" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> Sampul
                        <div class="mb-3">
                            <input type="hidden" name="existImage" value="<?php echo $sampul?>">
                            <img src="img/<?php echo $sampul; ?>" height="100px" width="150px">
                            <input type="file" class="form-control w-100" name="sampul" width="100%"
                                autocomplete="off" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="mb-3">
                            <label for="jumlahInput" class="form-label">Jumlah Buku</label>
                            <input type="number" class="form-control w-100" id="realese" name="jumlah" width="100%"
                                autocomplete="off" value="<?php echo $jumlah ?>" />
                        </div>
                    </td>
            </table>

            <button style="background-color:blue" type="submit" class="btn btn-primary" name="editBuku">Edit</button>
        </form>
    </div>
</div>
</aside>
</body>

</html>