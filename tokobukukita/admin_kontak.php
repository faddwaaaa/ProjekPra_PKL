<?php

include 'koneksi.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `pesan` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_kontak.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pesan</title>

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- css -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="messages">

   <h1 class="title"> Pesan </h1>

   <div class="box-container">
   <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `pesan`") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
   <div class="box">
      <p> User Id : <span><?php echo $fetch_message['user_id']; ?></span> </p>
      <p> Nama : <span><?php echo $fetch_message['nama']; ?></span> </p>
      <p> Nomor Telepon : <span><?php echo $fetch_message['number']; ?></span> </p>
      <p> Email : <span><?php echo $fetch_message['email']; ?></span> </p>
      <p> Pesan : <span><?php echo $fetch_message['pesan']; ?></span> </p>
      <a href="admin_kontak.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('Hapus pesan ini?');" class="delete-btn">Hapus Pesan</a>
   </div>
   <?php
      };
   }else{
      echo '<p class="empty">Anda tidak memiliki pesan!</p>';
   }
   ?>
   </div>

</section>


<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>