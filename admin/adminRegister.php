<?php

include '../components/connect.php';

session_start();


if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ?");
   $select_admin->execute([$name]);

    if($select_admin->rowCount() > 0){
        $message[] = 'username already exist!';
    }else{
        if($pass != $cpass){
        $message[] = 'confirm password not matched!';
        }else{
        $insert_admin = $conn->prepare("INSERT INTO `admins`(name, password) VALUES(?,?)");
        $insert_admin->execute([$name, $cpass]);
        $message[] = 'new admin registered successfully!';

        header('Location: adminlogin.php');
        exit();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Gamer Paradise Admin</title>
</head>
<body>

<section class="form-container">

<div class="wrapper1">  
    <div class="formWrapper1">
        <form action = "" method="POST">
             <h2>Admin Register</h2>
            <div class="group1">
                <input type="text" name="name" required maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <label for="">Name</label>
            </div>
            <div class="group1">
                <input type="password" name="pass" required maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <label for="">Password</label>
            </div>
            <div class="group1">
                <input type="password" name="cpass" required maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <label for="">Confirm Your Password</label>
            </div>
            <button type="submit" value="register now" class="button" name="submit">Register</button>
            <div class="registerLink">
                <p>Already have an account? <a href="../admin/adminLogin.php"
                class="loginBtn">Login</a></p>
            </div>
        </form>
    </div>
</div>

</section>

</body>
</html>