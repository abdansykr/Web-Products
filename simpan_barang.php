<?php 
	include "connec.php" ;
	$foto = $_FILES['gambar_barang']['name'];
	$file_tmp = $_FILES['gambar_barang']['tmp_name'] ;
	$nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang']; 
    $deskripsi_barang = $_POST['deskripsi_barang'];
	move_uploaded_file($file_tmp, 'image/'.$foto) ;
	$query = "INSERT INTO barang SET nama_barang = '$nama_barang', harga_barang = '$harga_barang', deskripsi_barang = '$deskripsi_barang' ,gambar_barang = '$foto'";
	mysqli_query($conn, $query) 
	or die("SQL Error " .mysqli_error());
	header('location:admin.php');
?>