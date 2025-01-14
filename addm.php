<?php
@include'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form using POST
    $last_name = $_POST['last_name'] ?? '';
    $first_name = $_POST['first_name'] ?? '';
    $middle_name = $_POST['middle_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $address = $_POST['address'] ?? '';
    $plan = $_POST['plan'] ?? '';
    $package = $_POST['package'] ?? '';
    $trainer = $_POST['trainer'] ?? '';

    // Validation: Check required fields
    
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (last_name, first_name, middle_name, email, contact, gender, address, plan, package, trainer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $last_name, $first_name, $middle_name, $email, $contact, $gender, $address, $plan, $package, $trainer);

        // Execute and check if successful
        if ($stmt->execute()) {
            echo "New member added successfully!";
            header("Location: newmember.php"); // Redirect to member list page
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Member Form</title>
    <link rel="stylesheet" href="css/addm.css">
</head>
<body>
    <div class="form-container">
        <h2>+ New Member</h2>
        <form method="post">
            <div class="form-group">
            <input type="hidden" name="user_id" id="user_id">
                <label for="id">ID No.</label>
                <input type="text" id="id" placeholder="Leave this blank if auto-generated">
            </div>
            <small>Leave this blank if you want to auto-generate ID No.</small>

            <div class="form-row">
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="last_Name">
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="first_Name">
                </div>
                <div class="form-group">
                    <label for="middleName">Middle Name</label>
                    <input type="text" id="middle_Name">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email">
                </div>
                <div class="form-group">
                    <label for="contact">Contact </label>
                    <input type="text" id="contact">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" rows="2"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="plan">Plan</label>
                    <select id="plan">
                        <option value="basic">Basic</option>
                        <option value="premium">Premium</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="package">Package</label>
                    <select id="package">
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="trainer">Trainer</label>
                    <select id="trainer">
                        <option value="trainer1">Trainer 1</option>
                        <option value="trainer2">Trainer 2</option>
                    </select>
                </div>
            </div>

            <div class="form-actions">
            <button type="submit" class="save-button">Save</button>
                <a href="newmember.php"><button type="button" class="cancel-button">Cancel</button></a>
            </div>
        </form>
    </div>
</body>
</html>
