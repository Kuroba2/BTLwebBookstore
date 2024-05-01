<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Về Chúng Tôi</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3> Thông tin về shop </h3>
   
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>Lý do nên lựa chọn chúng tôi?</h3>
         <p>Đặt lợi ích của khách hàng lên hàng đầu! PTITBookStore cam kết cung cấp dịch vụ khách hàng tốt nhất có thể. Giúp bạn giải đáp mọi thắc mắc và giải quyết một cách nhanh chóng và chuyên nghiệp.</p>
         <p>Kho tàng tri thức dồi dào! Nhiều thể loại khác nhau, bao gồm tiểu thuyết, sách khoa học, sách kinh doanh, sách văn hóa. Sự đa dạng này giúp bạn dễ dàng tìm thấy sách phù hợp với nhu cầu đọc của mình.</p>
         <a href="contact.php" class="btn">Liên Hệ</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Đánh giá của khách hàng</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/cloneuser.jpg" alt="">
         <p>Tôi đã có trải nghiệm mua sách tuyệt vời trên trang web PTITBookStore và thực sự ấn tượng với dịch vụ của họ. Tôi luôn tìm được thứ mình cần với mức giá phải chăng!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Kedanhcaptraitim03</h3>
      </div>

      <div class="box">
         <img src="images/cloneuser.jpg" alt="">
         <p>Giao diện của trang web rất dễ sử dụng và thân thiện với người dùng. Tìm kiếm sách và xem thông tin thuận tiện, giúp tôi dễ dàng tìm thấy những cuốn sách mà mình quan tâm!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Trangpham</h3>
      </div>

      <div class="box">
         <img src="images/cloneuser.jpg" alt="">
         <p>PTITBookStore thực sự gây ấn tượng về sự đa dạng các thể loại sách. Từ tiểu thuyết, truyện ngắn, sách khoa học, sách kinh doanh đến sách về lịch sử, văn hóa, và nghệ thuật!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Nguyenvanhoang123</h3>
      </div>

      <div class="box">
         <img src="images/cloneuser.jpg" alt="">
         <p>Tôi cảm thấy hài lòng với dịch vụ của PTITBookStore. Sản phẩm đến trong thời gian nhanh chóng và đúng thời hạn. Sẽ tiếp tục gắn bó và mua hàng ở đây trong tương lai!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Fancr7</h3>
      </div>

      <div class="box">
         <img src="images/cloneuser.jpg" alt="">
         <p>Một trải nghiệm mua sắm thú vị! Ở đây có rất nhiều lựa chọn sách và tôi đã tìm thấy đúng những gì tôi đang tìm kiếm thỏa mãn nhu cầu của mình. Dịch vụ giao hàng cũng rất tốt!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
         </div>
         <h3>jojo</h3>
      </div>

      <div class="box">
         <img src="images/cloneuser.jpg" alt="">
         <p>PTITBookStore cung cấp một trải nghiệm mua sắm trực tuyến thuận tiện và đáng tin cậy. Tôi đã mua nhiều cuốn sách từ đây và chưa bao giờ hối hận về lựa chọn của mình.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
         </div>
         <h3>Phương</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">Tác giả nổi bật</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/harukimurakami.jpg" alt="">
         <h3>Haruki Murakami</h3>
      </div>

      <div class="box">
         <img src="images/fscottfitzgerald.jpg" alt="">
         <h3>F.Scott Fitzgerald</h3>
      </div>

      <div class="box">
         <img src="images/nguyennhatanh.jpg" alt="">
         <h3>Nguyễn Nhật Ánh</h3>
      </div>

      <div class="box">
         <img src="images/higashinokeigo.jpg" alt="">
         <h3>Higashino Keigo</h3>
      </div>

      <div class="box">
         <img src="images/agathachristie.jpg" alt="">
         <h3>Agatha Christie</h3>
      </div>

      <div class="box">
         <img src="images/yonezawahonobu.jpg" alt="">
         <h3>Yonezawa Honobu</h3>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>