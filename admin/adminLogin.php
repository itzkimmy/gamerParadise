<?php

include '../components/connect.php';

session_start();

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
   $select_admin->execute([$name, $pass]);
   $row = $select_admin->fetch(PDO::FETCH_ASSOC);

   if($select_admin->rowCount() > 0){
      $_SESSION['admin_id'] = $row['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Gamer Paradise Admin</title>
</head>
<body>

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

<section class="form-container">
<div class="wrapper">
        <div class="formWrapper">
            <form action = "" method="POST">
                <h2>Admin Login</h2>
                <div class="group1">
                    <input type="text" name="name" required maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                    <label for="">Admin Name</label>
                </div>
                <div class="group1">
                    <input type="password" name="pass" required maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                    <label for="">Password</label>
                </div>
                <button type="submit" value="login now" class="button" name="submit">Login</button>
                <div class="registerLink">
                    <p>Dont'n have an account? <a href="../admin/adminRegister.php"
                    class="registerBtn">Register</a></p>
                </div>
            </form>
        </div>
</div>
</section>

<script src="../js/admin.js"></script>

</body>
</html>