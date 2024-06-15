<?php
// Include database connection file
include('../PHP/databasecon.php');

// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../HTML/login.php");
    exit();
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="../CSS/stylesheet.css">
</head>
<body>
    <div class="profile-container">
        <h1>Profile Page</h1>
        <div class="profile-details">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <!-- Add more fields as necessary -->
        </div>
        <a href="edit_profile.php">Edit Profile</a>
        <a href="../PHP/logout.php">Logout</a>
    </div>
</body>
</html>
