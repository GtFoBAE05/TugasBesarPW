<?php
    if(isset($_POST['editBuku'])){
        include('db.php');
        $id = $_POST['idbuku'];
        $judul = $_POST['judul'];
        $jumlah = $_POST['jumlah']; 
        $sampul = $_FILES['sampul']['name'];
        $temp_sampul = $_FILES['sampul']['tmp_name'];
        $folder = 'img/'.$sampul;   
        move_uploaded_file($temp_sampul,$folder);
        $query = mysqli_query($con,
            "UPDATE buku
            SET namaBuku='$judul', jumlahTersedia='$jumlah', gambarBuku='$sampul'
            WHERE idBuku='$id'") or die(mysqli_error($con));
        
        if($query){
            echo
                '<script>
                alert("Edit Buku Success");
                window.location = "indexAdmin.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Buku Failed");
                </script>';
        }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>