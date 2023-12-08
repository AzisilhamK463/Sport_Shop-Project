<?php
	session_start();
	include 'config.php';
	$id = $_GET['id'];
	$user_id = $_SESSION['id'];
	$kontak = mysqli_query($mysqli, "SELECT username FROM user WHERE id = '$user_id'");
	$a = mysqli_fetch_assoc($kontak);
	$produk = mysqli_query($mysqli, "SELECT * FROM data_produk WHERE Id = '$id' ");
	$p = mysqli_fetch_assoc($produk);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sport Shop</title>
	<link rel="stylesheet" href="styling.css">
	<link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
</head>
<body>
	<section>
		<div class="container">
			<header>
			<a href="circleLogo.html" class="logo">Sport Shop</a>
			<ul>
				<li><a href="produk.php"><span class="material-symbols-rounded">package</span></a></li>
			</ul>
			</header>
			<div class="content-box">
				<div class="content">
				    <h2>Detail Produk</h2>					
					<div class="imgBx">
						<img src="image/<?php echo $p['new_name'] ?>" width="100%">
					</div>
					<p><?php echo $p['merk'] ?></p>
					<p><?php echo $p['type'] ?></p>
					<p>Size : <?php echo number_format($p['size']) ?></p>
					<p>Rp. <?php echo number_format($p['harga']) ?></p>
				</div>
				<div class="content1">
					<form action="" method="POST" enctype="multipart/form-data">
						<h2>Konfirmasi Pesanan</h2>
						<div class="inputBox">
							<input type="text" name="nama" placeholder="Nama" required >
						</div>
						<div class="inputBox">
							<textarea type="text" name="alamat" placeholder="Alamat" required></textarea>
						</div>
						<div class="inputBox">
							<input type="text" name="status" value="Sedang Diproses" readonly>
						</div>
						<div class="inputBox">
							<input type="submit" name="submit" value="Submit">
						</div>
					</form>
					<?php 
					include 'config.php';	
						if(isset($_POST['submit'])){
							$nama 		= $_POST['nama'];
							$alamat 	= $_POST['alamat'];
							$status 	= $_POST['status'];
							$query="INSERT INTO transaksi SET nama='$nama',alamat='$alamat',status='$status'";
							mysqli_query($mysqli, $query);
							// mengalihkan ke halaman index.php
							header("location:cek_pesanan.php");
							
						}
					?>
				</div>
			</div>
			<div class="footer">
				<p><?php echo $a['username'] ?></p>
				<small>Copyright &copy; 2022 - Sport Shop.</small>
			</div>
		</div>
	</section>
</body>
</html>