<?php
session_start();

// Check if the user is logged in, if not then redirect them to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Retrieve the user's name from the session
$user_name = $_SESSION["user_name"];

// Include the database connection file
include_once 'databasecon.php';

// Fetch courses from the database
$sql = "SELECT courseID, courseName FROM courses";
$result = $conn->query($sql);

// Array to store courses
$courses = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}

$conn->close();
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
            <div class="course-container">
                <?php foreach ($courses as $course): ?>
                    <div class="course-box">
                        <h3><?php echo htmlspecialchars($course['courseName']); ?></h3>
                        <a href="view_course.php?id=<?php echo htmlspecialchars($course['courseID']); ?>">View Course</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>
