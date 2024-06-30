<?php
include "connec.php";

$nama_barang = $_POST['nama_barang'];
$harga_barang = $_POST['harga_barang'];
$deskripsi_barang = $_POST['deskripsi_barang'];
$id_barang = $_POST['id_barang'];

// Check if an image has been uploaded
if (isset($_FILES['gambar_barang']) && $_FILES['gambar_barang']['error'] === 0) {
    // Image uploaded, proceed with upload and update
    $foto = $_FILES['gambar_barang']['name'];
    $file_tmp = $_FILES['gambar_barang']['tmp_name'];
    move_uploaded_file($file_tmp, 'image/' . $foto);

    $query = "UPDATE barang SET nama_barang = '$nama_barang', harga_barang = '$harga_barang', deskripsi_barang = '$deskripsi_barang', gambar_barang = '$foto' WHERE id_barang = '$id_barang'";
} else {
    // No image uploaded, use the existing image from the database
    $existing_foto = $data['gambar_barang']; // Retrieve the existing image name from a variable

    $query = "UPDATE barang SET nama_barang = '$nama_barang', harga_barang = '$harga_barang', deskripsi_barang = '$deskripsi_barang' WHERE id_barang = '$id_barang'";
}

mysqli_query($conn, $query) or die("SQL Error " . mysqli_error());
header('location:admin.php');
