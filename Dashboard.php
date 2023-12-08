<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
    <link rel="stylesheet" href="styling.css">
</head>
<body>
    <section>
        <div class="container">
            <header>
                <a href="circleLogo.html" class="logo">Sport Shop</a>
                <ul>
                    <li><a href="#"><span class="material-symbols-rounded active">home</span></a></li>
                    <li><a href="cek_pesanan.php"><span class="material-symbols-rounded">shopping_cart</span></a></li>
                    <li><a href="log_out.php"><span class="material-symbols-rounded">logout</span></a></li>
                </ul>
            </header>
            <div class="content-box">
                <div class="content">
                    <h2>Selamat Berbelanja</h2>
                    <p>
                        Di Sport Shop kami menjualkan beberapa produk sepatu 
                        yang dijamin sangat berkualitas, 
                        dengan pemesanan online yang sangat cepat dan mudah.
                    </p>
                    
                </div>
                <div class="imgBx">
                    <img src="image/sepatu.png" alt="Gambar" class="img-content">
                </div>
            </div>
            <div class="box">
                <?php 
                    include_once("config.php");
                        $produk = mysqli_query($mysqli, "SELECT * FROM data_produk ORDER BY Id DESC LIMIT 10");
                        if(mysqli_num_rows($produk) > 0){
                            while($p = mysqli_fetch_array($produk)){
                ?>
                <div class="content-box1">
                    <div class="card">
                        <div class="imgBx1">
                            <img src="image/<?php echo $p['new_name'] ?>" alt="Gambar" class="img-card">
                            <h2 class="nama"><?php echo substr($p['merk'], 0, 30) ?></h2>
                            <p class="harga">Rp. <?php echo number_format($p['harga']) ?></p>
                        </div>
                        <div class="desc">
                            <div class="size">
                                <p class="Type"><?php echo substr($p['type'], 0, 30) ?></p>
                            </div>
                            <a href="transaksi.php?id=<?php echo $p['Id'] ?>">Buy Now</a>
                        </div>
                    </div>
                </div>
                <?php }}else{ ?>
                            <p>Produk tidak ada</p>
                        <?php } ?>
            </div>
            <div class="footer">
                <small>Copyright &copy; 2022 - Sport Shop.</small>
            </div>
        </div>
    </section>
</body>
</html>