<?php

session_start();
if(!isset($_SESSION["username"])){
    header("location: adminlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/new.css">
    <link rel="stylesheet" href="css/sign.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
        <img src="img/logo.png" width="225px"  alt="GYM">
            <ul>
            <a href="admindashboard.php" style="text-decoration: none; color: white "><li>Dashboard</li></a>
                <a href="newmember.php" style="text-decoration: none; color: white "><li>Members </li></a>
                <a href="#" style="text-decoration: none; color: white "><li>Trainers </li></a>
                <a href="addp.php" style="text-decoration: none; color: white "><li>Package</li></a>
                <li>Equipments</li>
                <li>Announcement</li>
                <li>Reports</li>
                <li>Access</li>
                
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <span>Welcome Admin</span>
                <form method="post"><button name="logout">Logout</button></form>
            </header>

            <?php

@include 'connection.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
   $user_type = mysqli_real_escape_string($conn,$_POST['usertype']);

   $select = " SELECT * FROM form WHERE name = '$name' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   

// Proceed only if $result is valid
if (mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $sql = "INSERT INTO form(name, email, password, usertype) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $sql);
         

         if (mysqli_query($conn, $sql)) {
          
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
      }
   }

};

?>
<div class="form-container">

<form action="" method="post">
   <h3>New User</h3>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <input type="text" name="name" required placeholder="enter your username">
   <input type="email" name="email" required placeholder="enter your email">
   <input type="password" name="password" required placeholder="enter your password">
   <input type="password" name="cpassword" required placeholder="confirm your password">
   <select name="usertype">
      <option value="member">Member</option>
      <option value="trainer">Trainer</option>
   </select>
   <input type="submit" name="submit" value="Save" class="form-btn">
</form>

</div>
    <?php
    if(isset($_POST['logout'])){
    session_destroy();
    header("location:adminlogin.php");
}
?>
</body>
</html>
