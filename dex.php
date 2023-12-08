<?php
// Create database connection using config file
include_once("config.php");
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM data_produk ORDER BY Id ASC");
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
    <!-- header -->
    <section>
        <div class="container-fluid">
            <header>
                <a href="circleLogo.html" class="logo">Sport Shop</a>
                <ul>
                    <li><a href="DashboardAdmin.php"><span class="material-symbols-rounded">home</span></a></li>
                    <li><a href="#"><span class="material-symbols-rounded active">inventory_2</span></a></li>
                    <li><a href="crud.php"><span class="material-symbols-rounded">inventory</span></a></li>
                    <li><a href="cek_pesananmasuk.php"><span class="material-symbols-rounded">draft_orders</span></a></li>
                    <li><a href="log_out.php"><span class="material-symbols-rounded">logout</span></a></li>
                </ul>
            </header>

            <button id="tombol">Hide/Show</button>

            <div id="box">
                <table>
                    <tr>
                        <th>ID</th> <th>Merk</th> <th>Type</th> <th>Harga</th> <th>Size</th> <th>Image</th> <th>Update</th>
                    </tr>
                    <?php  
                    while($user_data = mysqli_fetch_array($result)) { 
                    ?>        
                    <tr>
                        <td><?php echo $user_data['Id']; ?></td>
                        <td><?php echo $user_data['merk']; ?></td>
                        <td><?php echo $user_data['type']; ?></td>
                        <td><?php echo $user_data['harga']; ?></td>
                        <td><?php echo $user_data['size']; ?></td>  
                        <td><img src="image/<?php echo $user_data['new_name'] ?>" width="35" height="40"></td>
                        <td>
                            <a href="edit-produk.php?Id=<?php echo $user_data['Id'] ?>"><span class="material-symbols-rounded active">edit</span></a> 
                            <a href="proses-hapus.php?idp=<?php echo $user_data['Id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">
                            <span class="material-symbols-rounded active">delete</span></a>
                        </td>
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