<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us | KPMB Printing Service</title>

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

<div class="heading">
   <h3>ABOUT US</h3>
   <p><a href="home.php">home</a> <span> / about us</span></p>
</div>

<div class="contain">
   <h3>Welcome to KPMB Printing Services, where exceptional quality meets affordability! Founded by the dedicated owner Encik Megat, our printing business has been serving the KPMB community even before the MCO days. With a passion for helping students, Encik Megat provides budget-friendly printing services without compromising on quality. His mission is simple: to offer affordable printing solutions while ensuring top-notch quality. At KPMB Printing Services, we prioritize customer satisfaction and take pride in making printing accessible for everyone. Discover the perfect blend of quality, affordability, and dedicated service with us!</h3>
</div>


<!-- About Us section starts  -->
<footer class="footer">

   <section class="grid">

      <div class="box">
         <img src="pic/ecall.png" alt="">
         <h3>Contact Details</h3>
         <a href="mailto:megatprinting@gmail.com">megatprinting@gmail.com</a>
         <p>018-963547212</p>
      </div>

      <div class="box">
         <img src="pic/time.jpg" alt="">
         <h3>Opening Hours</h3>
         <p>Weekdays (Monday-Friday)</p>
         <p>10:10am to 5:55pm</p>
      </div>

      <div class="box">
         <img src="pic/loc.jpg" alt="">
         <h3>Location</h3>
         <p>KPM Beranang</p>
         <p>(Aras bawah bangunan purple)</p>
      </div>

      <div class="box">
         <img src="pic/notice.jpg" alt="">
         <h3>Notice</h3>
         <p>We are closed on 31 August 2023 due to Merdeka Day</p>
      </div>

   </section>


</footer>
<!-- About Us section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>