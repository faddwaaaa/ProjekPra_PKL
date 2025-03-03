<?php

include 'koneksi.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `pesan` WHERE nama = '$name' AND email = '$email' AND number = '$number' AND pesan = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'Pesan sudah terkirim!';
   }else{
      mysqli_query($conn, "INSERT INTO `pesan`(user_id, nama, email, number, pesan) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'Pesan berhasil terkirim!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>contact us</h3>
   <p> <a href="home.php">home</a> / contact </p>
</div>

<section class="contact">

   <form action="" method="post">
      <h3>say something!</h3>
      <input type="text" name="name" required placeholder="masukkan nama" class="box">
      <input type="email" name="email" required placeholder="masukkan email" class="box">
      <input type="number" name="number" required placeholder="masukkan nomor telepon" class="box">
      <textarea name="message" class="box" placeholder="masukkan pesan" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="masukkan pesan" name="send" class="btn">
   </form>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>