<?php

@include'connection.php';
if(!isset($_SESSION["username"])){
    header("location: adminlogin.php");
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $package_id = isset($_POST['package_id']) ? $_POST['package_id'] : null;
    $name = $_POST['name'] ?? null;

    $type = $_POST['type'] ?? null;
    $rate = $_POST['rate'] ?? null;

    // Validate required fields
    

    if ($package_id) {
        // Update existing trainer
        $stmt = $conn->prepare("UPDATE package SET name = ?,  type = ?, rate = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $type, $rate, $package_id);
    } else {
        $stmt = $conn->prepare("INSERT INTO package (name, type, rate) VALUES (?,  ?, ?)");
         $stmt->bind_param("ssssi", $name, $type, $rate, $package_id);
    }

    // Execute the query
    if ($stmt->execute()) {
       
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete trainer
    $stmt = $conn->prepare("DELETE FROM package WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
       
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch trainers for display
$result = $conn->query("SELECT * FROM package");
$package = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $package[] = $row;
    }
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
                <a href="newmember.php" style="text-decoration: none; color: white "><li>Members </li></a>
                <a href="addt.php" style="text-decoration: none; color: white "><li>Trainers </li></a>
                <a href="addp.php" style="text-decoration: none; color: white "><li>Package</li></a>
                <li>Equipments</li>
                <li>Announcement</li>
                <li>Reports</li>
                <a href="access.php" style="text-decoration: none; color: white "><li>Access</li></a>
                
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <span>Welcome Admin</span>
    
            </header>

            <!-- Top Cards -->
            <div class="table-container">
                
                <main>
        <section class="trainer-form">
        <form id="trainer-form" method="post">
        <h2>Add Equipment</h2>

        <input type="hidden" name="package_id" id="package_id">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>


        <label for="Type">Type:</label>
        <input type="text" name="type" id="type" required><br>

        <label for="rate">Rate:</label>
        <input type="text" name="rate" id="rate" required><br>

        <button type="submit">Save</button>
        <button type="reset">Cancel</button>
            
            
    </form>
        </section>

        <section class="trainer-list">
        <div class="trainer-list">
        <h2>List of Package</h2>
        <div class="table-controls">

            <label for="search">Search:</label>
            <input type="text" id="search" placeholder="Search">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Rate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php if (count($package) > 0): ?>
                <?php foreach ($package as $index => $package): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($package['name']) ?></td>
                        <td><?= htmlspecialchars($package['type']) ?></td>
                        <td><?= htmlspecialchars($package['rate']) ?></td>
                        <td>
                            <button onclick="editPackage(<?= htmlspecialchars(json_encode($package)) ?>)">Edit</button>
                            <a href="?delete_id=<?= $package['id'] ?>" onclick="return confirm('Are you sure you want to delete this trainer?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No trainers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        function editPackage(package) {
            document.getElementById('package_id').value = package.id;
            document.getElementById('name').value = package.name;
          
            document.getElementById('type').value = package.type;
            document.getElementById('rate').value = package.rate;
        }
    </script>
        </table>
       
    </div>
    </main>
    
    <?php
    if(isset($_POST['logout'])){
    session_destroy();
    header("location:adminlogin.php");
}
?>
</body>
</html>
