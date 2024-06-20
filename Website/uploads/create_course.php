<?php
include 'databasecon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courseName = $conn->real_escape_string($_POST['courseName']);

    // Insert the new course into the database
    $stmt = $conn->prepare("INSERT INTO courses (courseName) VALUES (?)");
    $stmt->bind_param("s", $courseName);

    if ($stmt->execute()) {
        echo "Course created successfully.";
    } else {
        echo "Failed to create course: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

// Redirect back to the admin page after creating the course
header("Location: admin.php");
exit;
?>
