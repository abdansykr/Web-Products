<!DOCTYPE html>
<html lang="en">

 	<head>
 		<!-- Meta Tags -->
		<meta charset="UTF-8">
		<meta name="author" content="Kamran Mubarik">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Title -->
 		<title>Admin</title>
 		<!-- Style Sheet -->
		<link rel="stylesheet" type="text/css" href="css/admin.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<style>
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

        button {
            margin-top: 10px;
        }

        .action-buttons a {
            background-color: #4caf50;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            margin-right: 5px;
            border-radius: 4px;
        }

        .action-buttons a.edit {
            background-color: #2196f3;
        }

        .action-buttons a.delete {
            background-color: #f44336;
        }
		</style>
 	</head>
<body>

	<header>
		<div class="container">
			<div class="brand">
				<div class="logo">
					<a href="admin.php">
						<img src="img/icons/toko.png">
					</a>
				</div> <!-- logo -->
				<div class="shop-icon">
					<div class="dropdown">
						<a href="index.php">
							<img src="img/icons/logout.png">
						</a>				
						</div>
					</div>
				</div> <!-- shop icons -->
			</div> <!-- brand -->
		</div> <!-- container -->
	</header> <!-- header -->

	<main>
		
		<div class="main-content">
			<div class="sidebar">
				<h3>Menu</h3>
				<ul>
					<li><a class="active" href="admin.php">Home</a></li>
					<li><a href="addProduct.html">Product</a></li>
				</ul>				
			</div>
			<div class="content dashboard">
				<h3>Dashboard</h3>
				<div class="content-data">
					<div class="content-detail">
						<h4>Semua Produk</h4>
						<table>
							<thead>
								<tr>
									<th>Produk</th>
									<th>Harga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$conn = new mysqli("localhost", "root", "", "toko-biru");
								$query = mysqli_query($conn, "SELECT * FROM barang");
								while($data = mysqli_fetch_array($query)) { 
								?>
								<tr>
								<td><?php echo $data['nama_barang']; ?></td>
								<td>Rp.<?php echo $data['harga_barang']; ?></td>
								<td>
                                    <a href="edit.php?id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-info">Edit</a>
									<a href="proses_hapus.php?id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-danger">Delete</a>
                                </td>
								</tr>
								<?php		
								}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>		

	</main> <!-- Main Area -->

	<footer>
	
	</footer> 
	 

</body>
</html>