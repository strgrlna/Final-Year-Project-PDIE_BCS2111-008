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
   <title>Status | KPMB Printing Service</title>

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

<!-- user orders status section starts -->

<div class="heading">
   <h3>STATUS</h3>
   <p><a href="home.php">home</a> <span> / status</span></p>
</div>

<section class="orders">

   <h1 class="title">your order status</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">please login to see your orders</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Placed On : <span><?= $fetch_orders['placed_on']; ?></span></p>
      <p>Name : <span><?= $fetch_orders['name']; ?></span></p>
      <p>Email : <span><?= $fetch_orders['email']; ?></span></p>
      <p>Number : <span><?= $fetch_orders['number']; ?></span></p>
      <p>Print Slot : <span><?= $fetch_orders['reservation']; ?></span></p>
      <p>Payment Method : <span><?= $fetch_orders['method']; ?></span></p>
      <p>Your Orders : <span><?= $fetch_orders['total_products']; ?></span></p>
      <p>Total Price : <span>RM <?= $fetch_orders['total_price']; ?></span></p>
      <p>Payment Status : <span style="color:<?php if($fetch_orders['status'] == 'pending'){ echo 'orange'; }elseif($fetch_orders['status'] == 'rejected'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['status']; ?></span> </p>
      <p>Notes : <span><?= $fetch_orders['notes']; ?></span></p>
      <p>Payment Link (Only for Online Banking method) : <a href="https://forms.gle/RrssKmo25FwXzKk19">Upload Payment Receipt Here!</a></p>
      <p>Document Uploaded : <a href="https://forms.gle/yKGycYQkNyTgcEVj9">Upload Document Here!</a></p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      }
   ?>

   </div>

</section>

<!-- user orders status section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>