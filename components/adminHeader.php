<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Gamer Paradise Admin</title>
</head>
<body>
    
<header class="header">

   <section class="flex">
      <a href="../admin/dashboard.php" class="logo">
      <img src="../image/GSlogo.png" width="30" height="30">  
      Gamer<span>Paradise</span></a>

      <nav class="navbar">
         <a href="../admin/dashboard.php">Home</a>
         <a href="../admin/adminAcc.php">Admins</a>
         <a href="../admin/userAcc.php">Users</a>
         <a href="../admin/products.php">Products</a>
         <a href="../admin/placedOrders.php">Orders</a>
         <a href="../admin/messages.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="../admin/updateProfile.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="../admin/adminRegister.php" class="option-btn">register</a>
            <a href="../admin/adminLogin.php" class="option-btn">login</a>
         </div>
         <a href="../components/adminLogout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

   </section>

</header>

<script src="../js/admin.js"></script>

</body>
</html>