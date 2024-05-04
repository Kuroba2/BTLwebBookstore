<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Đã tồn tại trong giỏ hàng!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'Đã được thêm vào giỏ hàng!!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trang Chủ</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>Khám phá Thế Giới của Sách!</h3>
      <p>Chào mừng đến với P-BOOK - điểm đến lý tưởng cho những người yêu sách! Tại đây, chúng tôi tự hào mang đến cho bạn một thư viện số đa dạng, nơi bạn có thể khám phá và thưởng thức hàng ngàn tựa sách từ mọi thể loại và tác giả. Dù bạn là một người đam mê văn học cổ điển, một người đang tìm kiếm những cuốn sách mới nhất trong thị trường hiện đại, hoặc đơn giản là muốn khám phá thêm về kiến thức và tri thức, chúng tôi đều có mọi thứ bạn cần. Hãy dừng lại, khám phá và cùng chúng tôi lan tỏa đam mê đọc sách!</p>
      <a href="about.php" class="white-btn">khám phá ngay thôi</a>
   </div>

</section>

<section class="products">

   <h1 class="title">Sách mới lên kệ</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price"><?php echo $fetch_products['price']; ?> VNĐ/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="Thêm vào giỏ hàng" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">Hết hàng rồi!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">Xem thêm</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>about</h3>
         <p>Tại đây, chúng tôi cung cấp một nền tảng đa dạng với hàng ngàn tựa sách từ các thể loại khác nhau, từ văn học cổ điển đến tiểu thuyết hiện đại, từ khoa học đến tiểu sử. Với giao diện thân thiện và tính năng tìm kiếm thông minh, bạn có thể dễ dàng khám phá những tác phẩm mới và tìm thấy những cuốn sách phù hợp với sở thích và nhu cầu của mình. Hãy tham gia cùng chúng tôi trên hành trình khám phá văn học và mang tri thức đến mọi người!</p>
         <a href="about.php" class="btn">đọc thêm</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>bạn có bất cứ thắc măc gì?</h3>
      <p>Tôi cần hỗ trợ hoặc thắc mắc về sản phẩm,làm thế nào để liên hệ với bạn?</p>
      <p>Tôi có thể trả lại hoặc đổi sách không?</p>
      <p>Có cách nào để theo dõi đơn hàng của tôi không?</p>
      <p>Thời gian giao hàng dự kiến là bao lâu?</p>
      <p>Làm thế nào để đặt hàng trên trang web của bạn?</p>
      <a href="contact.php" class="white-btn">liện hệ với chúng tôi</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>