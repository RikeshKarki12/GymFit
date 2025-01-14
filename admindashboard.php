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
    <link rel="stylesheet" href="admindashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
        
        <img src="img/logo.png" width="225px"  alt="GYM">
             <ul>
            <a href="admindashboard.php" style="text-decoration: none; color: white "><li>Dashboard</li></a>
                <a href="newmember.php" style="text-decoration: none; color: white "><li>Members </li></a>
                <a href="addt.php" style="text-decoration: none; color: white "><li>Trainers </li></a>
                <a href="addt.php" style="text-decoration: none; color: white "><li>Package</li></a>
                <a href="adde.php" style="text-decoration: none; color: white "><li>Equipments</li></a>
                <li>Announcement</li>
                <li>Reports</li>
                <a href="access.php" style="text-decoration: none; color: white "><li>Access</li></a>
                
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <span>Welcome Admin</span>
                <form method="post"><button name="logout">Logout</button></form>
            </header>

            <!-- Top Cards -->
            <div class="top-cards">
                <div class="card blue">
                    <h3>Total Members</h3>
                    <p>1</p>
                </div>
                <div class="card red">
                    <h3>Registered Members</h3>
                    <p>1</p>
                </div>
                <div class="card skyblue">
                    <h3>Announcements</h3>
                    <p>4</p>
                </div>
            </div>


            <!-- Bottom Stats -->
            <div class="bottom-stats">
                <div class="stat-box green">
                    <h3>Staff Users</h3>
                    <p>4</p>
                </div>
                <div class="stat-box blue">
                    <h3>Available Equipments</h3>
                    <p>6</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['logout'])){
    session_destroy();
    header("location:adminlogin.php");
}
?>
</body>
</html>
