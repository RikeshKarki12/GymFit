<?php

@include'connection.php';
if(!isset($_SESSION["username"])){
    header("location: adminlogin.php");
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $trainer_id = isset($_POST['trainer_id']) ? $_POST['trainer_id'] : null;
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $contact = $_POST['contact'] ?? null;
    $rate = $_POST['rate'] ?? null;

    // Validate required fields
    

    if ($trainer_id) {
        // Update existing trainer
        $stmt = $conn->prepare("UPDATE trainers SET name = ?, email = ?, contact = ?, rate = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $email, $contact, $rate, $trainer_id);
    } else {
        // Insert new trainer
        $stmt = $conn->prepare("INSERT INTO trainers (name, email, contact, rate) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $contact, $rate);
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
    $stmt = $conn->prepare("DELETE FROM trainers WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
       
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch trainers for display
$result = $conn->query("SELECT * FROM trainers");
$trainers = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $trainers[] = $row;
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
                <a href="#" style="text-decoration: none; color: white "><li>Trainers </li></a>
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
        <h2>Trainer Form</h2>

        <input type="hidden" name="trainer_id" id="trainer_id">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" required><br>

        <label for="rate">Rate:</label>
        <input type="text" name="rate" id="rate" required><br>

        <button type="submit">Save</button>
        <button type="reset">Cancel</button>
            
            
    </form>
        </section>

        <section class="trainer-list">
        <div class="trainer-list">
        <h2>List of Trainers</h2>
        <div class="table-controls">

            <label for="search">Search:</label>
            <input type="text" id="search" placeholder="Search">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Rate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php if (count($trainers) > 0): ?>
                <?php foreach ($trainers as $index => $trainer): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($trainer['name']) ?></td>
                        <td><?= htmlspecialchars($trainer['email']) ?></td>
                        <td><?= htmlspecialchars($trainer['contact']) ?></td>
                        <td><?= htmlspecialchars($trainer['rate']) ?></td>
                        <td>
                            <button onclick="editTrainer(<?= htmlspecialchars(json_encode($trainer)) ?>)">Edit</button>
                            <a href="?delete_id=<?= $trainer['id'] ?>" onclick="return confirm('Are you sure you want to delete this trainer?')">Delete</a>
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
        function editTrainer(trainer) {
            document.getElementById('trainer_id').value = trainer.id;
            document.getElementById('name').value = trainer.name;
            document.getElementById('email').value = trainer.email;
            document.getElementById('contact').value = trainer.contact;
            document.getElementById('rate').value = trainer.rate;
        }
    </script>
        </table>
       
    </div>
    </main>
 
</body>
</html>
