<?php
session_start();

// Check if the user is logged in, if not then redirect them to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include the database connection file
include_once 'databasecon.php';

// Get the chapter ID and current page number from the URL
$chapterID = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$studentID = $_SESSION["studentID"]; // Assuming you have stored the student's ID in the session

// Fetch the chapter details
$stmt = $conn->prepare("SELECT chapterName, path, courseID FROM chapters WHERE chapterID = ?");
$stmt->bind_param("i", $chapterID);
$stmt->execute();
$stmt->bind_result($chapterName, $filePath, $courseID);
$stmt->fetch();
$stmt->close();

// Fetch the total number of pages in the chapter
$stmt = $conn->prepare("SELECT COUNT(*) FROM chapter_pages WHERE chapterID = ?");
$stmt->bind_param("i", $chapterID);
$stmt->execute();
$stmt->bind_result($totalPages);
$stmt->fetch();
$stmt->close();

// Adjust total pages to include the uploaded file content as page 1
$totalPages += 1;

$content = '';
$title = '';

// Determine the content to display based on the current page
if ($currentPage == 1) {
    // Display the uploaded file content
    $content = file_get_contents($filePath);
    if ($content === false) {
        die("Failed to read file content");
    }
    $title = $chapterName;
} else {
    // Display the content from the database
    $pageToFetch = $currentPage - 1; // Adjust because the first page is the file content
    $stmt = $conn->prepare("SELECT pageTitle, pageContent FROM chapter_pages WHERE chapterID = ? AND pageNumber = ?");
    $stmt->bind_param("ii", $chapterID, $pageToFetch);
    $stmt->execute();
    $stmt->bind_result($pageTitle, $pageContent);
    $stmt->fetch();
    $stmt->close();

    $title = $pageTitle;
    $content = $pageContent;
}

// Mark chapter as completed (100% progress) if it's the last page
if ($currentPage == $totalPages) {
    $stmt = $conn->prepare("INSERT INTO chapter_completions (studentID, chapterID, progress) VALUES (?, ?, 100) ON DUPLICATE KEY UPDATE progress=100, completed_at=CURRENT_TIMESTAMP");
    $stmt->bind_param("ii", $studentID, $chapterID);
    $stmt->execute();
    $stmt->close();
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($title); ?></h1>
		<nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="chapter-content">
            <p><?php echo nl2br(htmlspecialchars($content)); ?></p>
        </section>
        <section id="navigation">
            <?php if ($currentPage > 1): ?>
                <a href="view_chapter.php?id=<?php echo $chapterID; ?>&page=<?php echo $currentPage - 1; ?>" class="prev-page">&#8592; Previous Page</a>
            <?php endif; ?>
            <?php if ($currentPage < $totalPages): ?>
                <a href="view_chapter.php?id=<?php echo $chapterID; ?>&page=<?php echo $currentPage + 1; ?>" class="next-page">Next Page &#8594;</a>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
<?php $conn->close(); ?>
