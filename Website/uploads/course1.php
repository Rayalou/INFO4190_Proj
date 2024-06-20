<?php
session_start();

// Check if the user is logged in, if not then redirect them to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Retrieve the user's name from the session
$user_name = $_SESSION["user_name"];

// File path to the chapter content
$chapterFile = 'chapter1_content.txt';

// Read the chapter content from the file
$chapterContent = file_get_contents($chapterFile);
if ($chapterContent === false) {
    die("Failed to read chapter content from file");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course 1: Introduction to Cybersecurity</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <h1>Welcome to Cybersecurity Academy</h1>
        <p>Hello, <?php echo htmlspecialchars($user_name); ?>!</p>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="resources.php">Resources</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="course-content">
            <h2>Course 1: Introduction to Cybersecurity</h2>
            <p><?php echo nl2br(htmlspecialchars($chapterContent)); ?></p>
        </section>
        <section id="navigation">
            <a href="course2.php" class="next-chapter">&#8594; Next Chapter</a>
        </section>
    </main>
</body>
</html>