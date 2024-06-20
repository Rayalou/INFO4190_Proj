<?php
session_start();

// Check if the user is logged in, if not then redirect them to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include the database connection file
include_once 'databasecon.php';

// Get the course ID from the URL
$courseID = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$studentID = $_SESSION["studentID"]; // Assuming you have stored the student's ID in the session

// Delete the progress for the course chapters for the current student
$stmt = $conn->prepare("DELETE chapter_completions 
                        FROM chapter_completions 
                        JOIN chapters ON chapter_completions.chapterID = chapters.chapterID 
                        WHERE chapter_completions.studentID = ? AND chapters.courseID = ?");
$stmt->bind_param("ii", $studentID, $courseID);
$stmt->execute();
$stmt->close();

$conn->close();

// Redirect back to the course page
header("Location: view_course.php?id=$courseID");
exit;
?>
