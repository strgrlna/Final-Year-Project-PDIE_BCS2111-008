<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];
   $reservation = $_POST['reservation'];
   $reservation = filter_var($reservation, FILTER_SANITIZE_STRING);
   $notes = $_POST['notes'];
   $notes = filter_var($notes, FILTER_SANITIZE_STRING);


   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);


   if($check_cart->rowCount() > 0){

         $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, reservation, total_products, total_price, notes) VALUES(?,?,?,?,?,?,?,?,?)");
         $insert_order->execute([$user_id, $name, $number, $email, $method, $reservation, $total_products, $total_price, $notes]);

         $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
         $delete_cart->execute([$user_id]);

         $message[] = 'order placed successfully!';
      
   }else{
      $message[] = 'your cart is empty';
   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout | KPMB Printing Service</title>

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
   <h3>checkout</h3>
   <p><a href="home.php">home</a> <span> / checkout</span></p>
</div>

<section class="checkout">

   <h1 class="title">order summary</h1>

<form action="" method="post">

   <div class="cart-items">
      <h3>cart items</h3>
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
      <p><span class="name"><?= $fetch_cart['name']; ?></span><span class="price">RM <?= $fetch_cart['price']; ?> x <?= $fetch_cart['quantity']; ?></span></p>
      <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
      <p class="grand-total"><span class="name">Total :</span><span class="price">RM <?= $grand_total; ?></span></p>
      <a href="cart.php" class="btn">view cart</a>
   </div>

   <input type="hidden" name="total_products" value="<?= $total_products; ?>">
   <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
   <input type="hidden" name="name" value="<?= $fetch_profile['name'] ?>">
   <input type="hidden" name="number" value="<?= $fetch_profile['number'] ?>">
   <input type="hidden" name="email" value="<?= $fetch_profile['email'] ?>">


   <div class="user-info">
      <h3>your info</h3>
      <p><i class="fas fa-user"></i><span><?= $fetch_profile['name'] ?></span></p>
      <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number'] ?></span></p>
      <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email'] ?></span></p>
      <a href="update_profile.php" class="btn">update info</a>
      <select name="method" class="box" required>
         <option value="" disabled selected>select payment method</option>
         <option value="Cash">Cash</option>
         <option value="Online Banking">Online Banking</option>
      </select>
      <select name="reservation" class="box" required>
         <option value="" disabled selected>select print slot</option>
         <option value="NONE">NONE (No Printing Job)</option>
         <option value="11 AM (MONDAY)">11 AM (MONDAY)</option>
         <option value="11 AM (TUESDAY)">11 AM (TUESDAY)</option>
         <option value="11 AM (WEDNESDAY)">11 AM (WEDNESDAY)</option>
         <option value="11 AM (THURSDAY)">11 AM (THURSDAY)</option>
         <option value="11 AM (FRIDAY)">11 AM (FRIDAY)</option>
         <option value="12 PM (MONDAY)">12 PM (MONDAY)</option>
         <option value="12 PM (TUESDAY)">12 PM (TUESDAY)</option>
         <option value="12 PM (WEDNESDAY)">12 PM (WEDNESDAY)</option>
         <option value="12 PM (THURSDAY)">12 PM (THURSDAY)</option>
         <option value="2:30 PM (MONDAY)">2:30 PM (MONDAY)</option>
         <option value="2:30 PM (TUESDAY)">2:30 PM (TUESDAY)</option>
         <option value="2:30 PM (WEDNESDAY)">2:30 PM (WEDNESDAY)</option>
         <option value="2:30 PM (THURSDAY)">2:30 PM (THURSDAY)</option>
         <option value="2:30 PM (FRIDAY)">2:30 PM (FRIDAY)</option>
         <option value="3 PM (MONDAY)">3 PM (MONDAY)</option>
         <option value="3 PM (TUESDAY)">3 PM (TUESDAY)</option>
         <option value="3 PM (WEDNESDAY)">3 PM (WEDNESDAY)</option>
         <option value="3 PM (THURSDAY)">3 PM (THURSDAY)</option>
         <option value="3 PM (FRIDAY)">3 PM (FRIDAY)</option>
         <option value="4 PM (MONDAY)">4 PM (MONDAY)</option>
         <option value="4 PM (TUESDAY)">4 PM (TUESDAY)</option>
         <option value="4 PM (WEDNESDAY)">4 PM (WEDNESDAY)</option>
         <option value="4 PM (THURSDAY)">4 PM (THURSDAY)</option>
         <option value="4 PM (FRIDAY)">4 PM (FRIDAY)</option>
         <option value="5 PM (MONDAY)">5 PM (MONDAY)</option>
         <option value="5 PM (TUESDAY)">5 PM (TUESDAY)</option>
         <option value="5 PM (WEDNESDAY)">5 PM (WEDNESDAY)</option>
         <option value="5 PM (THURSDAY)">5 PM (THURSDAY)</option>
         <option value="5 PM (FRIDAY)">5 PM (FRIDAY)</option>
      </select>
      <h4>Notes:</h4>
      <input type="text" required placeholder="" name="notes" maxlength="100" class="box">
      
      <input type="submit" value="place order" class="btn" style="width:100%; background:var(--red); color:var(--white);" name="submit">
   </div>

</form>
   
</section>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>