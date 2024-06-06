<?php
session_start();

// Check if the user is logged in, if not then redirect them to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Retrieve the user's name from the session
$user_name = $_SESSION["user_name"];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <h1>Welcome to Cybersecurity Academy</h1>
        <p>Hello, <?php echo htmlspecialchars($user_name); ?>!</p>
        <nav>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="courses">
            <h2>Your Courses</h2>
            <div class="course-box">
                <ul>
                    <li>
                        <a href="course1.php">Course 1: Introduction to Cybersecurity</a>
                        <div class="progress-bar">
                            <div class="progress" style="width: 100%;"></div>
                        </div>
                    </li>
                    <li>
                        <a href="course2.php">Course 2: Advanced Cyber Threats</a>
                        <div class="progress-bar">
                            <div class="progress" style="width: 20%;"></div>
                        </div>
                    </li>
                    <!-- Add more courses as needed -->
                </ul>
            </div>
        </section>
        <section id="resources">
            <h2>Resources</h2>
            <ul>
                <li><a href="resource1.php">Resource 1: Phishing Awareness</a></li>
                <li><a href="resource2.php">Resource 2: Secure Coding Practices</a></li>
                <!-- Add more resources as needed -->
            </ul>
        </section>
    </main>
</body>
</html>