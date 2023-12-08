<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'config.php';
 
// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];
$login = mysqli_query($mysqli,"select * from user where email='$email'");
$cek = mysqli_num_rows($login);
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	if(password_verify($password, $data['password'])){
		// cek jika user login sebagai admin
		if($data['level']=="1"){
			$_SESSION['id'] = $data['id'];
			$_SESSION['email'] = $email;
			$_SESSION['level'] = "1";
			header("location:DashboardAdmin.php");
 
		// cek jika user login sebagai Pembeli
		}else if($data['level']=="2"){
			$_SESSION['id'] = $data['id'];
			$_SESSION['email'] = $email;
			$_SESSION['level'] = "2";
			header("location:Dashboard.php");
 
		}else{
			header("location:index.php?pesan=gagal");
		}	
	}else{
		header("location:index.php?pesan=gagal");
	}
}else{
	header("location:index.php?pesan=gagal");
}
 
?>


