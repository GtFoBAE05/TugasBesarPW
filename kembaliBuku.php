<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("location: login.php");
    exit;
}

require './db.php';

$id = $_GET['id'];

kembalikanBuku($id);

$idBuku = $_GET['idBuku'];
updateStockBuku($idBuku, "tambah");

header("location: index.php");
exit;