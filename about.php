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
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <title>Gamer Paradise</title>
</head>
<body>
    
<?php include 'components/userHeader.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="image/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>Why Choose Us?</h3>
         <p>Gamers Paradise offers a wide range of gaming products with clear information and competitive pricing. Our fast and secure checkout and reliable delivery ensure a convenient shopping experience. Our customer service team is always available to assist you with any questions or concerns.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">Customer Reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="image/pic-1.png" alt="">
         <p>"I am so happy with my experience shopping at Gamers Paradise. The website was easy to navigate, and I found everything I needed for my gaming setup. The checkout process was smooth, and my order arrived quickly. I will definitely be shopping here again in the future."</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>John</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="image/pic-2.png" alt="">
         <p>"Gamers Paradise has the best selection of gaming products I have ever seen. They have all the latest releases, and their prices are very competitive. I was impressed with their fast delivery and excellent customer service. I highly recommend this website to any serious gamer."</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Emma</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="image/pic-3.png" alt="">
         <p>"I was a bit hesitant to purchase from Gamers Paradise, as I had never heard of them before. However, after reading some of the positive reviews, I decided to give them a try. I am so glad I did! Their website was easy to use, and my order arrived quickly and in perfect condition. I will definitely be a repeat customer."</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>David</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="image/pic-4.png" alt="">
         <p>"I was impressed with the level of customer service I received from Gamers Paradise. I had a question about a product, and their customer service team was very knowledgeable and helpful. They even offered some suggestions for other products that might meet my needs better. I appreciate the personal touch."</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Luna</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="image/pic-5.png" alt="">
         <p>"I am so happy I found Gamers Paradise. I have been looking for a specific gaming accessory for months, and they were the only website that had it in stock. Their checkout process was easy, and my order arrived in just a few days. I will definitely be a repeat customer and recommend this website to other gamers."</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Raju</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="image/pic-6.png" alt="">
         <p>"Gamers Paradise is my go-to website for all my gaming needs. They have a huge selection of products, and their prices are always competitive. I also appreciate their commitment to quality customer service. I have never had a negative experience shopping with them."</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Xinyi</h3>
      </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>