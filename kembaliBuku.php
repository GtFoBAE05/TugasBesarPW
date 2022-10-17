<?php
session_start();
require './db.php';

$id = $_GET['id'];

kembalikanBuku($id);

$idBuku = $_GET['idBuku'];
updateStockBuku($idBuku, "tambah");

header("location: ./index.php");
exit;