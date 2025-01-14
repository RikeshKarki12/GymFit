<?php
include'connection.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="select * from admin where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($conn,$sql);

	$row=mysqli_fetch_array($result);

	if (isset($row["usertype"]) && $row["usertype"] == "admin")
	{

		$_SESSION["username"]=$username;
		
		header("location:admindashboard.php");
	}

	else
	{
		echo "<script>alert('username or password incorrect');</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System - Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="login-container">
       <div class="ourlogo">
    <a href="index.php"><img src="img/logo.png" alt="logo"></a>
    </div>
    <form  method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text"  name="username" placeholder="USERNAME">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"  name="password" placeholder="PASSWORD">
            </div>
           <button type="submit" name="Login">Login

           </button>
        </form>
    </div>

</body>
</html>