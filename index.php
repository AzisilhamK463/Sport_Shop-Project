<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="design.css">
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
                    <h2>LOGIN</h2>
                    <form action="cek_login.php" method="post">
                    <?php 
                        if(isset($_GET['pesan'])){
                            if($_GET['pesan']=="gagal"){
                                echo "<div class='danger'>
                                        Username dan Password tidak sesuai !
                                    </div>";
                            }
                        }
                    ?>
                        <div class="inputBox">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="inputBox">
                            <input type="password" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="check">
                            <input type="checkbox" class="check-input" onclick="showpassword()">
                            <label class="check-label" for="show-password">Show Password</label>
                        </div>
                        <div class="inputBox">
                            <input class="btn" type="submit" value="Login">
                        </div>
                        <p class="forget">Tidak punya akun ? <a href="register.php">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function showpassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>