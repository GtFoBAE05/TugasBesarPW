<?php
// $_POST itu method di formnya
if (isset($_POST['register'])) {

    include './db.php';

    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $username = $_POST['username'];

    $select = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'");
    if (mysqli_num_rows($select)) {
        echo
            '<script>
                alert("Register gagal karena alamat email tersebut telah digunakan");
                window.location = "./register.php"
                </script>';
    } else {

        function upload()
        {
            $namaFile = $_FILES['gambar']['name'];
            $ukuranFile = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];
            $tmpName = $_FILES['gambar']['tmp_name'];

            if ($error === 4) {
                echo "<script>
                alert('pilih gambar !');
                </script>";
                return false;
            }

            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            //cek apakah gambar atau bukan
            if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                echo "<script>
				alert('Bukan gambar!'); window.history.back()
			    </script>";
                return false;
            }

            //cek ukuran file
            if ($ukuranFile > 1000000) {
                echo "<script>
				alert('ukuran gambar terlalu besar!');
			    </script>";
                return false;
            }

            //lolos pengecekan
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;

            move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

            return $namaFileBaru;
        }

        $gambar = upload();
        if (!$gambar) {
            return false;
        }

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