<?php
$con = mysqli_connect("localhost", "root", "", "tugasbesarpw");

function login($post)
{
    global $con;

    $email = $post["email"];

    $query = "SELECT * from users WHERE email='$email' ";
    $result = mysqli_query($con, $query);

    $row = [];

    if ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] == "admin") {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row["id"];
            header("location: indexAdmin.php");
            exit;
        } else {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row["id"];
            header("location: index.php");
            exit;
        }
    }
}

function show($query)
{
    global $con;

    $result = mysqli_query($con, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function showById($idBuku)
{
    global $con;

    $query = "SELECT * FROM buku WHERE idBuku = '$idBuku'";

    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($result);

    return $row;
}

function pinjamBuku($query)
{
    global $con;

    $result = mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function updateStockBuku($idBuku, $tujuan)
{
    global $con;

    $query = "SELECT * FROM buku WHERE idBuku = '$idBuku'";

    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($result);

    if ($tujuan == "kurang") {
        $jumlahTersedia = $row['jumlahTersedia'] - 1;
    } else {
        $jumlahTersedia = $row['jumlahTersedia'] + 1;
    }

    $query = "UPDATE buku SET jumlahTersedia='$jumlahTersedia' WHERE idBuku = '$idBuku'";

    $result = mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function kembalikanBuku($id)
{
    global $con;

    $query = "UPDATE statusbuku SET statusBuku ='buku telah dikembalikan' where id='$id'";

    $result = mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function returnAdmin()
{
    global $con;

    $query = "SELECT * FROM users WHERE email = 'admin'";

    $result = mysqli_query($con, $query);

    return mysqli_fetch_assoc($result);
}

function updatePasswordAdmin($password)
{
    global $con;

    $query = "UPDATE users SET pass = '$password' where email='admin'";

    $result = mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function showUserById($id)
{
    global $con;

    $query = "SELECT * FROM users WHERE id = '$id'";

    $result = mysqli_query($con, $query);

    return mysqli_fetch_assoc($result);
}

function updateUser($user, $id)
{
    global $con;
    $id = $id;

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
                window.location = "./index.php"
                </script>';
        exit;
    }

    move_uploaded_file($tmpName, 'img/' . $gambar);

    $query = "SELECT * FROM users WHERE email = ' $email ' ";

    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result)) {
        echo
            '<script>
                alert("Register gagal karena alamat email tersebut telah digunakan");
                window.location = "./index.php"
                </script>';
        return mysqli_affected_rows($con);
    } else {
        $query = "UPDATE users SET username='$username', email='$email', pass='$pass', foto='$gambar' where id = '$id'";
        $result = mysqli_query($con, $query);
        return mysqli_affected_rows($con);
    }

}

function addFeedback($post)
{
    global $con;

    $kritik = $_POST['kritik'];
    $saran = $_POST['saran'];

    $query = "INSERT into feedback values ('', '$kritik', '$saran', 'belum dibaca')";

    $result = mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function getFeedback()
{
    global $con;

    $query = "SELECT * FROM feedback";

    $result = mysqli_query($con, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function updateFeedback($id)
{
    global $con;

    $query = "UPDATE feedback SET status ='sudah dibaca' where id='$id'";

    $result = mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function deleteFeedback($id)
{
    global $con;

    $query = "DELETE FROM feedback where id='$id'";

    $result = mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function getPengumuman()
{
    global $con;

    $query = "SELECT * FROM pengumuman";

    $result = mysqli_query($con, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function getPengumumanById($id)
{
    global $con;

    $query = "SELECT * FROM pengumuman WHERE id= '$id'";

    $result = mysqli_query($con, $query);

    return mysqli_fetch_assoc($result);
}

function addPengumuman($post)
{
    global $con;

    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    $query = "INSERT into pengumuman values ('', '$judul', '$konten')";

    $result = mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function updatePengumuman($post, $id)
{
    global $con;

    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    $query = "UPDATE pengumuman SET judul ='$judul', konten='$konten' where id='$id'";

    $result = mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function deletePengumuman($id)
{
    global $con;

    $query = "DELETE FROM pengumuman where id='$id'";

    $result = mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}