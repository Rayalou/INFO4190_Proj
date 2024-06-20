<?php
include 'databasecon.php';

// Fetch existing courses
$sql = "SELECT courseID, courseName FROM courses";
$result = $conn->query($sql);

// Array to store courses
$courses = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}

// Fetch existing chapters
$sql = "SELECT chapterID, chapterName FROM chapters";
$result = $conn->query($sql);

// Array to store chapters
$chapters = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $chapters[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
<h1>Admin Panel</h1>
<h2>Create New Course</h2>
<form action="create_course.php" method="post">
    <label for="courseName">Course Name:</label>
    <input type="text" name="courseName" id="courseName" required>
    <input type="submit" value="Create Course">
</form>
<h2>Upload Chapter to Course</h2>
<form action="upload_chapter.php" method="post" enctype="multipart/form-data">
    <label for="courseID">Select Course:</label>
    <select name="courseID" id="courseID" required>
        <?php foreach ($courses as $course): ?>
            <option value="<?php echo $course['courseID']; ?>"><?php echo $course['courseName']; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="chapterName">Chapter Name:</label>
    <input type="text" name="chapterName" id="chapterName" required>
    <label for="file">Upload Chapter File:</label>
    <input type="file" name="file" id="file" required>
    <input type="submit" value="Upload Chapter">
</form>
<h2>Add Pages to Chapter</h2>
<form action="upload_pages.php" method="post">
    <label for="selectChapter">Select Chapter:</label>
    <select name="chapterID" id="selectChapter" required>
        <?php foreach ($chapters as $chapter): ?>
            <option value="<?php echo $chapter['chapterID']; ?>"><?php echo $chapter['chapterName']; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="pageTitle">Page Title:</label>
    <input type="text" name="pageTitle" id="pageTitle" required>
    <label for="pageNumber">Page Number:</label>
    <input type="number" name="pageNumber" id="pageNumber" required>
    <label for="pageContent">Page Content:</label><br>
    <textarea name="pageContent" id="pageContent" rows="4" cols="50" required></textarea><br>
    <input type="submit" value="Add Page">
</form>
</body>
</html>