<?php
@include'connection.php';

if(!isset($_SESSION["username"])){
    header("location: adminlogin.php");
}
?>
<?php
$result = $conn->query("SELECT id, CONCAT(first_name, ' ', last_name) AS name, email, address, contact FROM users");

$data = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else if ($result) {
   
} else {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/new.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
        <img src="img/logo.png" width="225px"  alt="GYM">
            <ul>
            <a href="admindashboard.php" style="text-decoration: none; color: white "><li>Dashboard</li></a>
                <a href="#" style="text-decoration: none; color: white "><li>Members </li></a>
                <a href="addt.php" style="text-decoration: none; color: white "><li>Trainers </li></a>
                <a href="addp.php" style="text-decoration: none; color: white "><li>Package</li></a>
                <li>Equipments</li>
                <li>Announcement</li>
                <li>Reports</li>
                <a href="access.php" style="text-decoration: none; color: white "><li>Access</li></a>
                
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <span>Welcome Admin</span>
               
            </header>

            <!-- Top Cards -->
            <div class="table-container">
                <h2>Member List</h2>
                <a href="addm.php" ><button class="new-button">+ New</button></a>
                <table class="member-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                // Include the backend code to fetch data
              
                foreach ($data as $row) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['contact']}</td>
                            <td><button class='btn btn-danger btn-sm'>Delete</button></td>
                        </tr>";
                }
                ?>
                    
                </table>
                
            </div>
    <?php
    if(isset($_POST['logout'])){
    session_destroy();
    header("location:adminlogin.php");
}
?>
</body>
</html>
