<?php

// Prepare variables for form data
$nama_barang = $_POST['nama_barang'];
$harga_barang = $_POST['harga_barang']; 
$deskripsi_barang = $_POST['deskripsi_barang'];

$foto_barang = $_FILES['gambar_barang']['name'];
$tmpName = $_FILES['gambar_barang']['tmp_name'];
$size = $_FILES['gambar_barang']['size'];
$type = $_FILES['gambar_barang']['type'];

$maxsize = 10000000;
$typeYgBoleh = array ("image/jpeg","image/png","image/jpg");

$dirFoto = "pict";
if(!is_dir($dirFoto))
    mkdir($dirFoto);
$fileTujuanFoto = $dirFoto."/".$foto_barang;

$dataValid = "YA";
if($size > 0)
{
    if($size > $maxsize)
    {
        echo "Ukuran File Terlalu Besar <br/>";
        $dataValid = "TIDAK";
    }
    if(!in_array($type, $typeYgBoleh))
    {
        echo "Type File Tidak Dikenal <br/>";
        $dataValid = "TIDAK";
    }
    if(strlen (trim($nama_barang))== 0)
    {
        echo "Nama Barang Harus Diisi !!! <br/>";
        $dataValid = "TIDAK";
    }
    if(strlen (trim($harga_barang))== 0)
    {
        echo "Harga Barang Harus Diisi !!! <br/>";
        $dataValid = "TIDAK";
    }
    if(strlen (trim($deskripsi_barang))== 0)
    {
        echo "Deskripsi Barang Harus Diisi !!! <br/>";
        $dataValid = "TIDAK";
    }

    include "connec.php";
    $sql_tambah = "INSERT INTO barang (nama_barang, harga_barang, deskripsi_barang, gambar_barang) VALUES ('$nama_barang', '$harga_barang', '$deskripsi_barang', '$foto_barang')";
    $hasil = mysqli_query($conn, $sql_tambah);
    if(!$hasil){
        echo "Data gagal disimpan !!! <br/>";
        echo mysqli_error($conn);
    }

    else
    {
        echo "<script>
            alert('Simpan Data Berhasil!');
            window.location.href='addProduct.html';
        </script>";
    }
}
$conn->close();
?>
