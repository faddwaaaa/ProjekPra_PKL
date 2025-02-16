<?php

include 'koneksi.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="img/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Para pelanggan TokoBukuKita sangat menghargai kenyamanan dan kemudahan yang kami tawarkan. Mereka merasa puas dengan berbagai koleksi buku yang lengkap dan terkurasi dengan baik, serta pengalaman berbelanja yang lancar dan ramah pengguna. Banyak yang memberikan pujian atas layanan pelanggan kami yang responsif dan cepat dalam menangani pertanyaan maupun keluhan. Mereka juga senang dengan proses pengiriman yang cepat dan aman, memastikan buku-buku sampai dengan kondisi prima. Dengan pilihan pembayaran yang beragam dan penawaran menarik, pelanggan merasa mendapatkan nilai lebih dalam setiap pembelian di TokoBukuKita.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-5.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">authors</h1>

   <div class="box-container">

      <div class="box">
         <img src="img/author (tere liye).jpg" alt="">
         <h3>Tere Liye</h3>
      </div>

      <div class="box">
         <img src="img/author (ahmad fuadi).jpg" alt="">
         <h3>Ahmad Fuadi</h3>
      </div>

      <div class="box">
         <img src="img/author (dhia).jpg" alt="">
         <h3>Dhia'an Farah</h3>
      </div>

      <div class="box">
         <img src="img/author (eka kurniawan).jpg" alt="">
         <h3>Eka Kurniawan</h3>
      </div>

      <div class="box">
         <img src="img/author (hassan shadily).jpg" alt="">
         <h3>Hassan Shadily</h3>
      </div>

      <div class="box">
         <img src="img/author (sapardi djoko damono).jpg" alt="">
         <h3>Sapardi Djoko Damono</h3>
      </div>

      <div class="box">
         <img src="img/author (wawan kurniawan).jpg" alt="">
         <h3>Wawan Kurniawan</h3>
      </div>

      <div class="box">
         <img src="img/author(didi suwardi).jpg" alt="">
         <h3>Didi Suwardi</h3>
      </div>

      <div class="box">
         <img src="img/author(nadzira shafa).jpg" alt="">
         <h3>Nadzira Shafa</h3>
      </div>
   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>