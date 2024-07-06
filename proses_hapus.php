<?php
// mengambil file koneksi.php
include("connec.php");

// mengambil id dari url
$id_barang = $_GET['id_barang'];

// Syntax untuk menghapus data berdasarkan id
$result = mysqli_query($conn, "DELETE  FROM Barang where id_barang = '$id_barang'");

// Setelah berhasil dihapus redirect ke admin.php
header("Location:admin.php");
