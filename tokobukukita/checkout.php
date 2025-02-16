<?php

include 'koneksi.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   if (isset($_POST['metode'])) {
      $method = mysqli_real_escape_string($conn, $_POST['metode']);
  } else {
      $method = '';
  }
   $address = mysqli_real_escape_string($conn, $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `keranjang` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['nama'].' ('.$cart_item['jumlah'].') ';
         $sub_total = ($cart_item['harga'] * $cart_item['jumlah']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE nama = '$name' AND number = '$number' AND email = '$email' AND metode = '$method' AND alamat = '$address' AND total_produk = '$total_products' AND total_harga = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'Keranjang anda kosong';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'Pesanan sudah dilakukan!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, nama, number, email, metode, alamat, total_produk, total_harga, tanggal) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'Pesanan berhasil dilakukan!';
         mysqli_query($conn, "DELETE FROM `keranjang` WHERE user_id = '$user_id'") or die('query failed');
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
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>checkout</h3>
   <p> <a href="home.php">home</a> / checkout </p>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `keranjang` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['harga'] * $fetch_cart['jumlah']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['nama']; ?> <span>(<?php echo '$'.$fetch_cart['harga'].'/-'.' x '. $fetch_cart['jumlah']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Keranjang anda kosong</p>';
   }
   ?>
   <div class="grand-total"> Jumlah Total : <span>Rp.<?php echo $grand_total; ?>/-</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>Siapkan pesanan anda</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Nama :</span>
            <input type="text" name="name" required placeholder="masukkan nama">
         </div>
         <div class="inputBox">
            <span>Nomor Telepon :</span>
            <input type="number" name="number" required placeholder="masukkan nomor telepon">
         </div>
         <div class="inputBox">
            <span> Email :</span>
            <input type="email" name="email" required placeholder="masukkan email">
         </div>
         <div class="inputBox">
            <span>Metode Pembayaran :</span>
            <select name="metode_pembayaran">
               <option value="cash on delivery">Cash On Delivery</option>
               <option value="credit card">Credit Card</option>
               <option value="dana">Dana</option>
               <option value="shopee pay">Shopee Pay</option>
               <option value="gopay">Gopay</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Jalan :</span>
            <input type="text" name="street" required placeholder="e.g. Jalan">
         </div>
         <div class="inputBox">
            <span>Desa :</span>
            <input type="text" name="village" required placeholder="e.g. Kalimanah">
         </div>
         <div class="inputBox">
            <span>Kota :</span>
            <input type="text" name="city" required placeholder="e.g. Purbalingga">
         </div>
         <div class="inputBox">
            <span>Provinsi :</span>
            <input type="text" name="province" required placeholder="e.g. Jawa Tengah">
         </div>
         <div class="inputBox">
            <span>Negara :</span>
            <input type="text" name="country" required placeholder="e.g. Indonesia">
         </div>
         <div class="inputBox">
            <span>Kode Pos :</span>
            <input type="number" min="0" name="pin_code" required placeholder="e.g. 53371">
         </div>
      </div>
      <input type="submit" value="order disini" class="btn" name="order_btn">
   </form>

</section>









<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>