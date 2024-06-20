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

// Fetch the course details
$stmt = $conn->prepare("SELECT courseName FROM courses WHERE courseID = ?");
$stmt->bind_param("i", $courseID);
$stmt->execute();
$stmt->bind_result($courseName);
$stmt->fetch();
$stmt->close();

// Fetch the chapters associated with the course
$stmt = $conn->prepare("SELECT chapterID, chapterName, path FROM chapters WHERE courseID = ?");
$stmt->bind_param("i", $courseID);
$stmt->execute();
$result = $stmt->get_result();

// Array to store chapters and calculate completed progress
$chapters = [];
$totalChapters = $result->num_rows;
$totalProgress = 0;

if ($totalChapters > 0) {
    while ($row = $result->fetch_assoc()) {
        // Get the progress status for the current student and chapter
        $chapterID = $row['chapterID'];
        $progressStmt = $conn->prepare("SELECT progress FROM chapter_completions WHERE studentID = ? AND chapterID = ?");
        $progressStmt->bind_param("ii", $studentID, $chapterID);
        $progressStmt->execute();
        $progressStmt->bind_result($progress);
        $progressStmt->fetch();
        $row['progress'] = $progress ? $progress : 0;
        $totalProgress += $row['progress'];
        $progressStmt->close();

        $chapters[] = $row;
    }
}

$stmt->close();

// Calculate overall completion percentage
$completionPercentage = $totalChapters > 0 ? ($totalProgress / ($totalChapters * 100)) * 100 : 0;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($courseName); ?></title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($courseName); ?></h1>
    </header>
    <main>
        <section id="course-chapters">
            <h2>Overall Progress: <?php echo number_format($completionPercentage, 2); ?>%</h2>
            <div class="progress-bar-container">
                <div class="progress-bar" style="width: <?php echo $completionPercentage; ?>%;"></div>
            </div>
            <h2>Chapters for <?php echo htmlspecialchars($courseName); ?></h2>
            <ul>
                <?php foreach ($chapters as $chapter): ?>
                    <li>
                        <a href="view_chapter.php?id=<?php echo htmlspecialchars($chapter['chapterID']); ?>">
                            <?php echo htmlspecialchars($chapter['chapterName']); ?>
                        </a>
                        <!-- Display progress bar -->
                        <div class="progress-bar-container">
                            <div class="progress-bar" style="width: <?php echo $chapter['progress']; ?>%;"></div>
                        </div>
                        <span><?php echo $chapter['progress']; ?>% completed</span>
                    </li>
                <?php endforeach; ?>
            </ul>
            <form action="reset.php" method="get">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($courseID); ?>">
                <button type="submit">Retry Course Again</button>
            </form>
        </section>
        <section id="navigation">
            <a href="dashboard.php" class="back-dashboard">&#8592; Back to Dashboard</a>
        </section>
    </main>
</body>
</html>
<?php $conn->close(); ?>

