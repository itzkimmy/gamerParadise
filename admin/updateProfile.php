<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:adminLogin.php');
}

// Fetch the admin profile using the admin_id
$fetch_profile_query = $conn->prepare("SELECT * FROM admins WHERE id = ?");
$fetch_profile_query->execute([$admin_id]);
$fetch_profile = $fetch_profile_query->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   $update_profile_name = $conn->prepare("UPDATE `admins` SET name = ? WHERE id = ?");
   $update_profile_name->execute([$name, $admin_id]);

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $prev_pass = $_POST['prev_pass'];
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = sha1($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if($old_pass == $empty_pass){
      $message[] = 'please enter old password!';
   }elseif($old_pass != $prev_pass){
      $message[] = 'old password not matched!';
   }elseif($new_pass != $confirm_pass){
      $message[] = 'confirm password not matched!';
   }else{
      if($new_pass != $empty_pass){
         $update_admin_pass = $conn->prepare("UPDATE `admins` SET password = ? WHERE id = ?");
         $update_admin_pass->execute([$confirm_pass, $admin_id]);
         $message[] = 'password updated successfully!';
         
         // Redirect to adminLogin.php
         header('location: adminLogin.php');
         exit();
      }else{
         $message[] = 'please enter a new password!';
      }
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
    <title>gamer paradise admin</title>
</head>
<body>

<div class="wrapper2">  
    <div class="formWrapper2">
        <form action = "" method="post">
             <h2>Update Profile</h2>
             <input type="hidden" name="prev_pass" value="<?= $fetch_profile['password']; ?>">
            <div class="group1">
                <input type="text" name="name" value="<?= $fetch_profile['name']; ?>" required maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <label for="">Name</label>
            </div>
            <div class="group1">
                <input type="password" name="old_pass" required maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <label for="">Enter Old Password</label>
            </div>
            <div class="group1">
                <input type="password" name="new_pass" required maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <label for="">Enter New Password</label>
            </div>
            <div class="group1">
                <input type="password" name="confirm_pass" required maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <label for="">Confirm New Password</label>
            </div>
            <button type="submit" value="register now" class="button" name="submit">Update</button>
        </form>
    </div>
</div>

</body>
</html>