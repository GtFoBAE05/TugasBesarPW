<?php
    if(isset($_POST['addBuku'])){
        include('db.php');
        $judul = $_POST['judul'];
        $sampul = $_FILES['sampul']['name'];
        $temp_sampul = $_FILES['sampul']['tmp_name'];
        $jumlah = $_POST['jumlah'];
        $folder = 'img/'.$sampul;
        move_uploaded_file($temp_sampul,$folder);
        $query = mysqli_query(
            $con, 
            "INSERT INTO buku(namaBuku,gambarBuku,jumlahTersedia)
            Values
                ('$judul','$sampul','$jumlah')"
        )
        or die(mysqli_error($con));


        if($query){
            echo
            '<script>
                alert("Register Success");
                window.location = "indexAdmin.php"
            </script>';
        } else {
            echo
            '<script>
                alert("Register Failed");
            </script>';
        }
        
        }else {
            echo
            '<script>
                window.history.back()
            </script>';
        }
?>