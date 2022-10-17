<?php
// $_POST itu method di formnya
if (isset($_POST['register'])) {

    include './db.php';

    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $username = $_POST['username'];

    $gambar = $_FILES['foto']['name'];
    $tmpName = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error'];

    if ($error === 4) {
        echo
            '<script>
                alert("Silahkan pilih gambar");
                window.location = "./register.php"
                </script>';
        exit;
    }

    move_uploaded_file($tmpName, 'img/' . $gambar);

    $select = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'");
    if (mysqli_num_rows($select)) {
        echo
            '<script>
                alert("Register gagal karena alamat email tersebut telah digunakan");
                window.location = "./register.php"
                </script>';
    } else {
        $query = mysqli_query(
            $con,
            "INSERT INTO users(email, pass, username, foto)
                VALUES
                ('$email', '$pass', '$username', '$gambar')"
        )
        or die(mysqli_error($con));
    }

    if ($query) {
        echo
            '<script>
                alert("Register Success");
                window.location = "./index.php"
                </script>';
    } else {
        echo
            '<script>
                alert("Register Failed");
                </script>';
    }
} else {
    echo
        '<script>
            window.history.back()
            </script>';
}