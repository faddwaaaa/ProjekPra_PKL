<?php

include 'koneksi.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'Pengguna sudah ada!';
   }else{
      if($pass != $cpass){
         $message[] = 'Konfirmasi kata sandi tidak cocok!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(nama, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'Berhasil Terdaftar!';
         header('location:login.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

    <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- css  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
    
<div class="form-container">
    <form action="" method="post">
        <h3>Register Now</h3>
        <input type="text" name="name" placeholder="masukkan nama" required class="box">
        <input type="email" name="email" placeholder="masukkan email" required class="box">
        <input type="password" name="password" placeholder="masukkan password" required class="box">
        <input type="password" name="cpassword" placeholder="konfirmasi password" required class="box">
        <select name="user_type" class="box">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" name="submit" value="Sign up" class="btn">
        <p>Sudah memiliki akun? <a href="login.php">Log in</a></p>
    </form>
</div>

</body>
</html>