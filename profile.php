<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Profile | KPMB Printing Service</title>

   <!-- font link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<?php
   $pic="pic/photostat.jpg";
?>

<style>
   body{
      background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url('<?php echo $pic;?>');
      background-size: 100%;
   }
</style>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<!-- user profile section starts -->

<section class="tails">
   <h1 class="title">User Profile</h1>

   <div class="user">
      <img src="pic/icon.png" alt="">
      <p><i class="fas fa-user"></i>NAME: <span><span><?= $fetch_profile['name']; ?></span></span></p>
      <p><i class="fas fa-phone"></i>PHONE NO: <span><?= $fetch_profile['number']; ?></span></p>
      <p><i class="fas fa-envelope"></i>EMAIL ADDRESS: <span><?= $fetch_profile['email']; ?></span></p>
      <a href="update_profile.php" class="btn">update info</a>
   </div>

</section>

<!-- user profile section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>