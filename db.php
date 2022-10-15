<?php
$con = mysqli_connect("localhost", "root", "", "tugasbesarpw");

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