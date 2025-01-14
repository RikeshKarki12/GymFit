<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/sign.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Login </h3>
      <select name="usertype">
         <option value="user">Member</option>
         <option value="trainer">Trainer</option>
      </select>
      <a href="trainerlogin.php"><input type="submit" name="submit" value="Login now" class="form-btn"></a>
   </form>

</div>
<?php
if (isset($_POST['submit'])) {
    // Check which role is selected
    if (isset($_POST['usertype'])) {
        $role = $_POST['usertype'];

        if ($role === 'user') {
            header("Location: loginn.php");
            exit(); 
        } elseif ($role === 'trainer') {
            header("Location: trainerlogin.php");
            exit(); 
        }
    }
}
?>
</body>
</html>