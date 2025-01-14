<!DOCTYPE html>
<html lang="en">
    <?php
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Staff Dashboard</title>
    <link rel="stylesheet" href="trainerdashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <nav class="sidebar">
        <img src="img/logo.png" width="225px"  alt="GYM">
        <br>
        <br>
            <ul>
                <li>Dashboard</li>
                <li>Manage Members</li>
                <li>Gym Equipment</li>
                <li>Member's Status</li>
                <li>Payments</li>
                <li>Manage Attendance</li>
            </ul>
        </nav>
        <div class="main-content">
            <header>
                <span>Welcome Staff User</span>
                <a href="#" class="logout">Forgot Password</a> <a href="trainerlogin.php" class="logout">Logout</a>
            </header>
            <section class="stats">
                <div class="stat-box">
                    <h3>3</h3>
                    <p>Registered</p>
                    <div class="stat-change">+10%</div>
                </div>
                <div class="stat-box">
                    <h3>$6</h3>
                    <p>Total Earnings</p>
                    <div class="stat-change">17.8%</div>
                </div>
                <div class="stat-box">
                    <h3>2</h3>
                    <p>Active Trainers</p>
                    <div class="stat-change">+5%</div>
                </div>
                <div class="stat-box">
                    <h3>6</h3>
                    <p>Equipments</p>
                    <div class="stat-change">+9%</div>
                </div>
                <div class="stat-box">
                    <h3>5</h3>
                    <p>Staffs</p>
                    <div class="stat-change">-40%</div>
                </div>
            </section>
            <section class="tasks">
                <h3>Customer's To-Do Lists</h3>
                <ul>
                    <li>Test Completed <span class="status in-progress">In Progress</span></li>
                    <li>Mastering Crunches <span class="status pending">Pending</span></li>
                    <li>Standing Workouts For Flat Abs <span class="status in-progress">In Progress</span></li>
                    <li>Triceps Buildup - 3 Set <span class="status in-progress">In Progress</span></li>
                    <li>Decline Dumbbell Bench Press <span class="status pending">Pending</span></li>
                    <li>dddd <span class="status pending">Pending</span></li>
                    <li>Test 1 <span class="status in-progress">In Progress</span></li>
                </ul>
            </section>
        </div>
    </div>
</body>
</html>
