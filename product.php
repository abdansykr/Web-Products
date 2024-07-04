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
 		<!-- Meta Tags -->
		<meta charset="UTF-8">
		<meta name="author" content="Kamran Mubarik">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Title -->
 		<title>E-Commerce Online Shop</title>
 		<!-- Style Sheet -->
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<!-- Javascript -->	
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<!-- FancyBox -->
		<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
		<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>

		<!-- Optionally add helpers - button, thumbnail and/or media -->
		<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
		<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
		<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js"></script>

		<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
		<script>
		$(document).ready(function(){		
			$('.fancybox').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});
		});

  		</script>
 	</head>
<body>

	<header>
		<div class="container">
			<div class="brand">
				<div class="logo">
					<a href="index.php">
						<img src="img/icons/toko.png">
					</a>
				</div> <!-- logo -->
			</div> <!-- brand -->
		</div> <!-- container -->
	</header> <!-- header -->

	<div class="container">
		<main>
			<div class="breadcrumb">
				<ul>
					<li><a href="index.php">Home</a></li>
				</ul>
			</div> <!-- End of Breadcrumb-->

			<div class="single-product">
				<div class="images-section">
					<div class="larg-img">
						<img src="image/<?php echo $foto; ?>">
					</div>
				</div> <!-- End of Images Section-->

				<div class="product-detail">
					<div class="product-name">
						<h2><?php echo $nama_barang; ?></h2>
					</div>
					<div class="product-price">
						<h3><?php echo $harga_barang; ?></h3>
					</div>
					<hr>
					<div class="product-long-description">
				<h3>Deskripsi Produk</h3>
				<p>
				<?php echo $deskripsi_barang; ?>
				</p>
			</div>
				</div>
			</div>
			<hr>
			<hr>
		</main> 
	</div>

	<footer>
		<div class="container">
	</footer> 

</body>

</html>