<!DOCTYPE html>
<html lang="en">
    <?php
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Dashboard</title>
    <link rel="stylesheet" href="userdashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
            <img src="img/logo.png" width="225px"  alt="GYM">
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active">Dashboard</a></li>
                    <li><a href="#">To-Do</a></li>
                    <li><a href="#">Reminders</a></li>
                    <li><a href="#">Announcement</a></li>
                    <li><a href="#">Reports</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main>
            <header class="main-header">
                <div class="welcome-message">Welcome Customer</div>
                <a href="#" class="logout">Forgot password</a> <a href="index.php" class="logout">Logout</a>
                
            </header>

            <section class="content">
                <div class="todo-list">
                    <h3>My To-Do List</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Opts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Placeholder for dynamic content -->
                        </tbody>
                    </table>
                </div>

                <div class="announcement">
                    <h3>Gym Announcement</h3>
                   
                    <button class="view-all">View All</button>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
