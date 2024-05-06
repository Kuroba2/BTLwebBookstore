<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'Số '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['state'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'Giỏ hàng trống!';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'Đã tạo đơn thanh toán!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'Tạo đơn thành công!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }

   header('location:orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trang Thanh Toán</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>checkout</h3>
   <p> <a href="home.php">Trang Chủ</a> / Thanh Toán </p>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo ''.$fetch_cart['price'].'K VNĐ/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Giỏ hàng trống!</p>';
   }
   ?>
   <div class="grand-total"> Tổng tiền: <span><?php echo $grand_total; ?>K VNĐ/-</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>Đơn hàng của bạn</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Tên:</span>
            <input type="text" name="name" required placeholder="Nhập tên của bạn">
         </div>
         <div class="inputBox">
            <span>Số điện thoại:</span>
            <input type="text" name="number" required placeholder="Nhập số điện thoại của bạn">
         </div>
         <div class="inputBox">
            <span>Email:</span>
            <input type="email" name="email" required placeholder="Nhập email của bạn">
         </div>
         <div class="inputBox">
            <span>Phương thức thanh toán:</span>
            <select name="method">
               <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
               <option value="Thẻ tín dụng">Thẻ tín dụng</option>
               <option value="Momo">Thanh toán qua ví Momo</option>
               <option value="VNpay">Thanh toán qua ví VNpay</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Số nhà:</span>
            <input type="text" name="flat" required placeholder="01">
         </div>
         <div class="inputBox">
            <span>Đường:</span>
            <input type="text" name="street" required placeholder="Hoàng Quốc Việt">
         </div>
         <div class="inputBox">
            <span>Quận:</span>
            <input type="text" name="city" required placeholder="Cầu Giấy">
         </div>
         <div class="inputBox">
            <span>Thành phố:</span>
            <input type="text" name="state" required placeholder="Hà Nội">
         </div>
         <div class="inputBox">
            <span>Đất nước:</span>
            <input type="text" name="country" required placeholder="Việt Nam">
         </div>
         <div class="inputBox">
            <span>Mã PIN:</span>
            <input type="number" min="0" name="pin_code" required placeholder="012345">
         </div>
      </div>
      <input type="submit" value="Xác nhận" class="btn" name="order_btn">
   </form>

</section>









<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>

