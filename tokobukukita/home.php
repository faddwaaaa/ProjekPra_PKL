<?php

include 'koneksi.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `keranjang` WHERE nama = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Sudah ditambahkan ke keranjang!';
   }else{
      mysqli_query($conn, "INSERT INTO `keranjang`(user_id, nama, harga, jumlah, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'Produk ditambahkan ke keranjang!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>HAND PICKED BOOK TO YOUR DOOR.</h3>
      <p>Selamat datang di TokoBukuKita, toko buku online yang menyediakan koleksi buku terlengkap dari berbagai genre, penulis, dan penerbit. Temukan buku-buku favorit Anda dengan mudah dan nikmati pengalaman belanja yang nyaman dengan berbagai pilihan pembayaran dan pengiriman cepat. Dari novel best-seller hingga buku akademik, kami siap memenuhi kebutuhan membaca Anda. Jelajahi sekarang dan temukan dunia baru melalui setiap halaman buku yang kami tawarkan.</p>
      <a href="about.php" class="white-btn">Discover more</a>
   </div>

</section>

<section class="products">

   <h1 class="title">Produk Terbaru</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `produk` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['nama']; ?></div>
      <div class="price">Rp.<?php echo $fetch_products['harga']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['nama']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['harga']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="masukkan keranjang" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">Tidak ada produk yang ditambahkan!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="img/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>About Us</h3>
         <p>TokoBukuKita adalah salah satu toko buku terkenal di Indonesia. Toko buku online yang menyediakan berbagai koleksi buku dari berbagai genre, penulis, dan penerbit. Kami memiliki antarmuka pengguna yang intuitif dan menyediakan berbagai pilihan pembayaran serta pengiriman cepat. Dari novel hingga buku akademik, Anda dapat menemukan berbagai pilihan bacaan di sini. Jelajahi dan temukan buku yang Anda cari.</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>Temukan inspirasimu di TokoBukuKita, Pilihan buku terlengkap dengan kemudahan berbelanja online.</p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
