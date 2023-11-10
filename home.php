<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<?php
   $pic="pic/photostat.jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home | KPMB Printing Service</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<style>
   body{
      background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url('<?php echo $pic;?>');
      background-size: 100%;
   }
</style>
<body>

<?php include 'components/user_header.php'; ?>



<section class="hero">

   <div class="swiper hero-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <span>WELCOME TO</span>
               <h4>&nbsp</h4>
               <h3>KPMB Printing Service</h3>
               <h4>&nbsp</h4>
               <h4>Your one-stop printing solution</h4>
               <h4>Need assistance? Click here to know more about us.</h4>
               <a href="notice.php" class="btn">more Info</a>
            </div>
            <div class="image">
               <img src="pic/photostat.jpg" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>A top-tier service from us to you</span>
               <h3>Service</h3>
               <a href="catalog.php" class="btn">see catalog</a>
            </div>
            <div class="image">
               <img src="pic/file.jpg" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Book your print slot now</span>
               <h3>Reservation</h3>
               <a href="catalog.php" class="btn">see catalog</a>
            </div>
            <div class="image">
               <img src="pic/cal.jpg" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Need a customization? We are here!</span>
               <h3>Add On</h3>
               <a href="catalog.php" class="btn">see catalog</a>
            </div>
            <div class="image">
               <img src="pic/coil1.jpg" alt="">
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>



<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>