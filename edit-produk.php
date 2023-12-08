<?php 
	session_start();
	include 'config.php';

	$err ="";
	$sukses ="";
	
	$produk = mysqli_query($mysqli, "SELECT * FROM data_produk WHERE Id= '".$_GET['Id']."' ");
	if(mysqli_num_rows($produk) == 0){
		echo '<script>window.location="data-produk.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sport Shop</title>
	<link rel="stylesheet" href="design3.css">
   	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet"
    	href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<section>
		<div class="box">
			<div class="square" style="--i:0;"></div>
			<div class="square" style="--i:1;"></div>
			<div class="square" style="--i:2;"></div>
			<div class="square" style="--i:3;"></div>
			<div class="square" style="--i:4;"></div>
			<div class="container container-md">
				<div class="form">
					<h2>
					Edit Data Produk
					</h2>
					<a href="dex.php"><span class="material-symbols-rounded">arrow_back</span></a>
					<?php
					if ($err) {
					?>
					<div class="alert alert-danger rounded-pill" role="alert" style="opacity: .6;">
						<?php echo $err; ?>
						<a href="" class="btn-close float-end"></a>
					</div>
					<?php
					}; ?>
					<?php
					if ($sukses) {
					?>
					<div class="alert alert-success rounded-pill" role="alert" style="opacity: .6;">
						<?php echo $sukses; ?>
						<a href="index.php" class="btn-close float-end"></a>
					</div>
					<?php
					}; ?>

					<form action="" method="POST" enctype="multipart/form-data">
						<div class="inputBox">
							<input type="text" name="merk" class="form-control" placeholder="Merk" value="<?php echo $p->merk ?>" required>
						</div>
						<div class="inputBox">
							<input type="text" name="type" class="form-control" placeholder="Type" value="<?php echo $p->type ?>" required>
						</div>
						<div class="inputBox">
							<input type="number" name="harga" class="form-control" placeholder="Harga" value="<?php echo $p->harga ?>" required>
						</div>
						<div class="inputBox">
							<input type="number" name="size" class="form-control" placeholder="Size" value="<?php echo $p->size ?>" required>
						</div>
						<img src="image/<?php echo $p->new_name ?>" width="100px">
						<div class="inputBox">
							<input type="text" name="foto" value="form<?php echo $p->new_name ?>" readonly>
						</div>
						<div class="inputBox">
							<input type="file" name="gambar" class="form-control">
						</div>
						<div class="inputBox">
							<input type="submit" name="submit" value="Submit">
						</div>
					</form>

					<?php 
						if(isset($_POST['submit'])){

							// data inputan dari form
							$kategori 	= $_POST['kategori'];
							$merk 		= $_POST['merk'];
							$type 		= $_POST['type'];
							$harga 		= $_POST['harga'];
							$size 		= $_POST['size'];
							$foto 	 	= $_POST['foto'];
							// data gambar yang baru
							$filename = $_FILES['gambar']['name'];
							$tmp_name = $_FILES['gambar']['tmp_name'];

							

							// jika admin ganti gambar
							if($filename != ''){
								$type1 = explode('.', $filename);
								$type2 = $type1[1];

								$newname = 'image'.time().'.'.$type2;

								// menampung data format file yang diizinkan
								$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

								// validasi format file
								if(!in_array($type2, $tipe_diizinkan)){
									// jika format file tidak ada di dalam tipe diizinkan
									$err = "Format file tidak diizinkan";

								}else{
									unlink('image/'.$foto);
									move_uploaded_file($tmp_name, './image/'.$newname);
									$namagambar = $newname;
								}

							}else{
								// jika admin tidak ganti gambar
								$namagambar = $foto;
								
							}

							// query update data produk
							$update = mysqli_query($mysqli, "UPDATE data_produk SET 
													merk = '".$merk."',
													type = '".$type."',
													harga = '".$harga."',
													size = '".$size."',
													new_name = '".$namagambar."'
													WHERE Id = '".$p->Id."'	");
							if($update){
								$sukses = "Ubah data berhasil";
							}else{
								$err = "Ubah data gagal!";
							}
							
						}
					?>
				</div>
			</div>
		</div>
	</section>
</body>
</html>