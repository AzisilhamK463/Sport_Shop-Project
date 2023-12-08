<?php 
    session_start();
    include 'config.php';
    $produk = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id= '".$_GET['id']."' ");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="proses_transaksi.php"</script>';
    }
    $p = mysqli_fetch_object($produk);
    $err ="";
    $sukses =""; 
    // membuat nilai acak
    if(isset($_POST['submit'])){
        // data inputan dari form
        $status     = $_POST['status'];
        $resi     = rand(1111111111111,99999999999999); 
        // query update data produk
        $update = mysqli_query($mysqli, "UPDATE transaksi SET 
            status = '".$status."',
            resi = '".$resi."'
            WHERE id = '".$p->id."' ");
        if($update){
            $sukses = "Data berhasil di update.";
        }else{
            $err = "Data gagal di update.";
        }                        
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sport Shop</title>
    <link rel="stylesheet" href="design1.css">
    <link rel="stylesheet" href="styling2.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <section>
        <div class="container">
            <header>
                <a href="circleLogo.html" class="logo">Sport Shop</a>
                <ul>
                    <li><a href="cek_pesananmasuk.php"><span class="material-symbols-rounded">arrow_back</span></a></li>
                </ul>
            </header>
            <div class="container-update">
                <div class="form">
                    <h2>
                        Edit Data Produk
                    </h2>
                    <?php
                    if ($err) {
                    ?>
                    <div class="alert alert-danger rounded-pill" role="alert" style="opacity: .8; font-weight: 700;">
                        <?php echo $err; ?>
                        <a href="" class="btn-close float-end"></a>
                    </div>
                    <?php
                    }; ?>
                    <?php
                    if ($sukses) {
                    ?>
                    <div class="alert alert-success rounded-pill" role="alert" style="opacity: .8; font-weight: 700;">
                        <?php echo $sukses; ?>
                        <a href="" class="btn-close float-end"></a>
                    </div>
                    <?php
                    }; ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <h2>Proses:</h2>
                        <div class="inputBox">
                            <select class="form-control" name="status" required>
                                <option value="Pesanan Anda Dikirim">Kirim</option>
                                <option value="Pesanan Anda Dibatalkan">Dibatalkan</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>