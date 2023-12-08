<?php
// Create database connection using config file
include_once("config.php");
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM transaksi ORDER BY Id ASC");
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sport Shop</title>
    <link rel="stylesheet" href="styling1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.6.1.js"></script>
    <script>
        $(document).ready(function() {
  
        $("#tombol").click(function() {
        $("#box").toggle("slow");
        })
    });
   </script>
</head>
<body>
    <section>
        <div class="container-fluid">
            <header>
                    <a href="circleLogo.html" class="logo">Sport Shop</a>
                    <ul>
                        <li><a href="Dashboard.php"><span class="material-symbols-rounded">home</span></a></li>
                        <li><a href="#"><span class="material-symbols-rounded active">shopping_cart</span></a></li>
                        <li><a href="log_out.php"><span class="material-symbols-rounded">logout</span></a></li>
                    </ul>
            </header>
        
            <button id="tombol">Hide/Show</button>

            <div id="box">
                <table>
        
                    <tr>
                        <th>ID</th> <th>Nama</th> <th>Alamat</th> <th>Status</th> <th>Resi</th>
                    </tr>
                    <?php  
                    while($user_data = mysqli_fetch_array($result)) { 
                    ?>        
                        <tr>
                        <td><?php echo $user_data['id']; ?></td>
                        <td><?php echo $user_data['nama']; ?></td>
                        <td><?php echo $user_data['alamat']; ?></td>
                        <td><?php echo $user_data['status']; ?></td>
                        <td><?php echo $user_data['resi']; ?></td>
                    </tr>  
                    <?php      
                    }
                    ?>
                </table>
            </div>
            
            <div class="footer">
                <small>Copyright &copy; 2022 - Sport Shop.</small>
            </div>
        </div>
    </section>
</body>
</html>