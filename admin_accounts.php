<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['admin_id'])){
   $admin_id = $_SESSION['admin_id'];
}else{
   $admin_id = '';
   header('location:admin_login.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Profile | KPMB Printing Service</title>

   <!-- font link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- admin profile section starts  -->

<section class="accounts">

   <h1 class="heading">admins profile</h1>

   <section class="user-details">

   <div class="user">
      <img src="../pic/icon.png" alt="">
      <p><i class="fas fa-envelope"></i>ID: <span><?= $fetch_profile['id']; ?></span></p>
      <p><i class="fas fa-user"></i>NAME: <span><?= $fetch_profile['name']; ?></span></p>
      <a href="update_profile.php" class="btn">update info</a>
   </div>

</section>

   </div>

</section>

<!-- admin profile section ends -->

<script src="js/admin_script.js"></script>


















<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>