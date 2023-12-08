<?php 

include 'config.php';

$err ="";
$sukses ="";

if (isset($_POST['upload'])) { // If isset upload button or not
	// Declaring Variables
	$merk = $_POST['merk'];
	$type = $_POST['type'];
	$harga = $_POST['harga'];
	$size = $_POST['size'];
	$location = "image/";
	$file_new_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
	$file_name = $_FILES["file"]["name"]; // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
	$file_size = $_FILES["file"]["size"]; // Get uploaded file size

	if ($file_size > 10485760) { // Check file size 10mb or not
		$err = "Ukuran file terlalu besar, Maksimal ukuran file 10 MB.";
	} else {
		$sql = "INSERT INTO data_produk (merk,type,harga,size,name, new_name)
				VALUES ('$merk','$type','$harga','$size','$file_name', '$file_new_name')";
		$result = mysqli_query($mysqli, $sql);
		if ($result) {
			move_uploaded_file($file_temp, $location . $file_new_name);
			$sukses = "Produk berhasil ditambahkan!";
		} else {
			$err = "Produk gagal ditambahkan!";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"
    	href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="design1.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
   	<script src="js/bootstrap.bundle.min.js"></script>
	<title>Sport Shop</title>
</head>
<body>
	<section>
		<div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
		<div class="box">
			<div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
			<div class="container">
				<div class="form">
					<h2>Tambah Produk</h2>
					<a href="DashboardAdmin.php"><span class="material-symbols-rounded">arrow_back</span></a>
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
						<a href="" class="btn-close float-end"></a>
					</div>
					<?php
					}; ?>
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="inputBox">
							<input type="text" name="merk" placeholder="Merk">
						</div>
						<div class="inputBox">
							<input type="text" name="type" placeholder="Type">
						</div> 
						<div class="inputBox">
							<input type="number" name="harga" placeholder="Harga">
						</div>
						<div class="inputBox">
							<input type="number" name="size" placeholder="Size">
						</div>
						<div class="inputBox">
							<input type="file" name="file" id="upload" required style="opacity: 0; height: 70px; cursor: pointer;">
							<label for="upload">
								<i class="fa fa-file-text-o fa-3x"></i>
							</label>
						</div>
						
						<button name="upload" class="upload">Upload</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>
</html>