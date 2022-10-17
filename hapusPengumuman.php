<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("location: login.php");
    exit;
}

include 'db.php';

$id = $_GET['id'];

deletePengumuman($id);

header("location: indexAdmin.php");
exit;