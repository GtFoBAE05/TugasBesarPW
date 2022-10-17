<?php
if (isset($_GET['idbuku'])) {
    include('db.php');
    $id = $_GET['idbuku'];
    $queryCheck = mysqli_query($con, "SELECT statusBuku FROM statusbuku WHERE idBuku='$id'")or
    die(mysqli_error($con));
    if($queryCheck =="dipinjam"){
        echo
        '<script>
            alert("Buku yang ingin dihapus masih dipinjam"); 
            window.location = "indexAdmin.php"
        </script>';
    }else{
        $queryDelete = mysqli_query($con, "DELETE FROM buku WHERE idBuku='$id'") or
        die(mysqli_error($con));
        if ($queryDelete) {
            echo
            '<script>
                alert("Delete Success"); 
                window.location = "indexAdmin.php"
            </script>';
        } else {
            echo
            '<script>
                alert("Delete Failed"); 
                window.location = "indexAdmin.php"
            </script>';
        }
    }
    }else{
        echo
        '<script>
            window.history.back()
        </script>';
    }
?>