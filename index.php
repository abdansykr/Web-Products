<!DOCTYPE html>
<html lang="en">

 	<head>
 		<!-- Meta Tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Title -->
 		<title>Toko Biru</title>
 		<!-- Style Sheet -->
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<!-- Javascript -->	
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  		<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  		<script>
		    $(document).ready(function(){
		      $('.slider').bxSlider({
				  auto: true,
				  autoControls: true,
				  stopAutoOnClick: true,
				  pager: true
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
				<div class="shop-icon">
					<div class="dropdown">
						<a href="login.html">
							<img src="img/icons/account.png" alt="Login">
						</a>
					</div>
				</div> 
			</div> 

			<div class="menu-bar">
				<div class="menu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.html">About</a></li>
					</ul>
				</div>
			</div> <!-- menu -->

		</div> <!-- container -->
	</header> <!-- header -->

	<div class="container">
		<main>
			<div class="slider">
				<div class="slide-1">
					<img src="img/slider/slide-1.jpg">
				</div>
				<div class="slide-2">
					<img src="img/slider/slide-2.jpg">
				</div>
				<div class="slide-3">
					<img src="img/slider/slide3.jpg">
				</div>		
			</div> <!-- slider -->

			<div class="new-product-section">
				<div class="product-section-heading">
					<h2>Produk kami <img src="img/icons/increase.png"></h2>
					<h3>Produk teratas kami</h3>
				</div>
				<div class="product-content">
					<?php
					include "connec.php";
					$query = "SELECT * FROM barang";
					$result = mysqli_query($conn, $query);
					if (mysqli_num_rows($result) > 0 ){
						while ($row = mysqli_fetch_assoc($result))
						{?>
						<div class="product-card">
							<a href="product.php?id_barang=<?php echo $row['id_barang']; ?>" class="product-link">
								<div class="product-image">
								<img src="image/<?php echo $row['gambar_barang']; ?>" alt="<?php echo $row['nama_barang']; ?>">
                  </div>
						<div class="product-details">
							<h3 class="product-title"><?php echo $row['nama_barang'] ?></h3>
						<div class="product-actions">
							<p class="product-price"><?php echo $row['harga_barang'] ?></p>
						</div>
						</div>
						</a>
						</div>
						<?php
						}
					}
					else {
						echo "Produk tidak ditemukan !!!";
					}
					mysqli_close($conn)
					?>
				</div>
			</div> <!-- New Product Section -->

			<div class="collection">
				<div class="pasar1">
				</div>
				<div class="pasar2">
				</div>
			</div> <!-- Collection Section -->
		</main> <!-- Main Area -->
	</div>

	<footer>

	</footer> <!-- Footer Area -->

</body>

</html>