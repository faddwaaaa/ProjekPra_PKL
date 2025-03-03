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
   <title>shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>our shop</h3>
   <p> <a href="home.php">home</a> / shop </p>
</div>

<section class="products">

   <h1 class="title">Produk Terbaru</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `produk`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['nama']; ?></div>
      <div class="price">$<?php echo $fetch_products['harga']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['nama']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['harga']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="masukkan keranjang" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">Belum ada produk yang ditambahkan!</p>';
      }
      ?>
   </div>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>