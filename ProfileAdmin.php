<?php
include 'Sidebar.php';

$admin = returnAdmin();

if (isset($_POST['editPassword'])) {
    if (updatePasswordAdmin($_POST['password']) > 0) {
        echo
            '<script>
            alert("Berhasil ubah password!"); window.location = "./indexAdmin.php"
            </script>';
    } else {
        echo
            '<script>
            alert("Gagal ubah password!"); window.location = "./indexAdmin.php"
            </script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile Admin</title>
    </head>

    <body>
        <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
    solid #141414; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
    0.19);">
            <h4>Ganti Password Admin</h4>
            <hr>
            <div class="countainer card-content w-50">
                <form action="" method="POST" enctype="multipart/form-data">
                    <table style="width: 100%;">
                        <div><input type="text" name="idAdmin" hidden value="<?php echo $id ?>"></div>
                        <tr>
                            <td>
                                <div class="mb-3">
                                    <label for="titleInput" class="form-label">Password</label>
                                    <input type="password" class="form-control w-100" name="password" width="100%"
                                        autocomplete="off" value="<?php echo $admin['pass'] ?>" />
                                </div>
                            </td>
                        </tr>
                    </table>
                    <button style="background-color:blue" type="submit" class="btn btn-primary"
                        name="editPassword">Edit</button>
                </form>
            </div>
        </div>
    </body>

</html>