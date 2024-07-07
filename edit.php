<?php
// Menampilkan data berdasarkan data yang kita pilih.
include("connec.php");
// Mengambil id dari url
$id_barang = $_GET['id_barang'];

// Syntax untuk mengambil data berdasarkan id
$result = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
while ($data = mysqli_fetch_array($result)) {
    $nama_barang = $data['nama_barang'];
    $harga_barang = $data['harga_barang'];
    $deskripsi_barang = $data['deskripsi_barang'];
    $foto = $data['gambar_barang'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }

        nav {
            background-color: #ddd;
            padding: 1em;
        }

        nav a {
            padding: 0.5em 1em;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            margin-right: 1em;
        }

        nav a:hover {
            background-color: #555;
            color: white;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <h1>Edit Data Barang</h1>
    </header>
    <nav>
        <a href="admin.php">Home</a>
    </nav>
    <div class="container">
    <form name="update_barang" method="post" action="proses_edit.php" enctype="multipart/form-data">
    <table border="0">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga_barang" value="<?php echo $harga_barang; ?>"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><input type="text" name="deskripsi_barang" value="<?php echo $deskripsi_barang; ?>"></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td>
                <img src="image/<?php echo $foto; ?>" style="width: 100px; height: auto;">
                <input type="file" name="gambar_barang">  </td>
        </tr>
        <tr>
            <td><input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>"></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>

    </div>
</body>

</html>