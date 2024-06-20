<?php
include 'databasecon.php';

// Validate and sanitize inputs
$chapterID = intval($_POST['chapterID']);
$pageTitle = htmlspecialchars($_POST['pageTitle']);
$pageNumber = intval($_POST['pageNumber']);
$pageContent = htmlspecialchars($_POST['pageContent']);

// Insert page into chapter_pages table
$stmt = $conn->prepare("INSERT INTO chapter_pages (chapterID, pageNumber, pageTitle, pageContent) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiss", $chapterID, $pageNumber, $pageTitle, $pageContent);
$stmt->execute();
$stmt->close();

$conn->close();

// Redirect back to admin page with success message
header("Location: admin.php?addPage=success");
exit();
?>
