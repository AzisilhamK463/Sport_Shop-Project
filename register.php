<?php
// mulai session
session_start();
// cek apakah user sudah login atau belum
if (isset($_SESSION['username'])) {
   header("location:index.php");
}
include 'config.php';

$email = "";
$username = "";
$code = "";
$password = "";
$level = "";
$err = "";
$sukses = "";
// jika tombol submit diklik
if (isset($_POST['register'])) {
   $email = $_POST['email'];
   $username = $_POST['username'];
   $code = $_POST['code'];
   $password = $_POST['password'];
   // cek username dan password jika kosong maka tampilkan error
   if ($email == '' or $username == '' or $password == '') {
      $err .= "Silahkan isi lengkap data anda";
   }

   $password = password_hash($password, PASSWORD_DEFAULT);

   if ($code == 'a643m'){
      $level = 1;
   } else {
      $level = 2;
   }

   // jika tidak kosong maka cek username apakah sudah ada atau belum
   if (empty($err)) {
      $sql1 = "SELECT * FROM user WHERE email = '$email'";
      $q1 = mysqli_query($mysqli, $sql1);
      if (mysqli_num_rows($q1) > 0) {
         $err = "Pendaftaran gagal, Email sudah ada";
      } else {
         $sql = "INSERT INTO user (email, username, password, level) VALUES ('$email', '$username', '$password', '$level')";
         $query = mysqli_query($mysqli, $sql);
         if ($query) {
            $sukses = "Pendaftaran berhasil, silahkan login";
         } else {
            $err = "Pendaftaran gagal";
         }
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   <link rel="stylesheet" href="design1.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <script src="js/bootstrap.bundle.min.js"></script>
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
         <div class="container container-md">
            <div class="form">
               <h2>
                  Daftar
               </h2>
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

               <form action="" method="post">
                  <div class="inputBox">
                     <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com">
                  </div>
                  <div class="inputBox">
                     <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                  <div class="inputBox">
                     <input type="password" class="form-control" id="code" name="code" placeholder="code akses">
                  </div>
                  <div class="form-check">
                     <input type="checkbox" class="form-check-input" onclick="showcode()">
                     <label class="form-check-label" for="show-code">Show Code</label>
                  </div>
                  <div class="inputBox">
                     <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="form-check">
                     <input type="checkbox" class="form-check-input" onclick="showpassword()">
                     <label class="form-check-label" for="show-password">Show Password</label>
                  </div>
                  <script>
                     // fungsi untuk menampilkan password
                     function showcode() {
                        var x = document.getElementById("code");
                        if (x.type === "password") {
                           x.type = "text";
                        } else {
                           x.type = "password";
                        }
                     }
                     function showpassword() {
                        var x = document.getElementById("password");
                        if (x.type === "password") {
                           x.type = "text";
                        } else {
                           x.type = "password";
                        }
                     }
                  </script>
                  <div class="inputBox">
                     <input type="submit" name="register" value="Register">
                  </div>

                  <p class="forget">Sudah mempunyai akun ? <a href="index.php">Login di sini</a></p>
               </form>
            </div>
         </div>
      </div>
   </section>
</body>

</html>