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

$conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <script>
        function fetchChapters(courseID, targetSelectID) {
            if (courseID) {
                fetch('get_chapters.php?courseID=' + courseID)
                    .then(response => response.json())
                    .then(data => {
                        let chapterSelect = document.getElementById(targetSelectID);
                        chapterSelect.innerHTML = '<option value="">Select a Chapter</option>';
                        data.forEach(chapter => {
                            let option = document.createElement('option');
                            option.value = chapter.chapterID;
                            option.text = chapter.chapterName;
                            chapterSelect.add(option);
                        });
                    })
                    .catch(error => console.error('Error fetching chapters:', error));
            } else {
                document.getElementById(targetSelectID).innerHTML = '<option value="">Select a Chapter</option>';
            }
        }
    </script>
</head>
<body>
<h1>Admin Panel</h1>
<h2>Create New Course</h2>
<form action="create_course.php" method="post">
    <label for="courseName">Course Name:</label>
    <input type="text" name="courseName" id="courseName" required>
    <input type="submit" value="Create Course">
</form>
<h2>Create New Chapter</h2>
<form action="create_chapter.php" method="post">
    <label for="courseID">Select Course:</label>
    <select name="courseID" id="courseID" required>
        <?php foreach ($courses as $course): ?>
            <option value="<?php echo $course['courseID']; ?>"><?php echo $course['courseName']; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="chapterName">Chapter Name:</label>
    <input type="text" name="chapterName" id="chapterName" required>
    <input type="submit" value="Create Chapter">
</form>

<h2>Upload Chapter to Course</h2>
<form action="upload_chapter.php" method="post" enctype="multipart/form-data">
    <label for="uploadCourse">Select Course:</label>
    <select name="courseID" id="uploadCourse" required onchange="fetchChapters(this.value, 'uploadChapter')">
        <option value="">Select a Course</option>
        <?php foreach ($courses as $course): ?>
            <option value="<?php echo $course['courseID']; ?>"><?php echo $course['courseName']; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="uploadChapter">Select Chapter:</label>
    <select name="chapterID" id="uploadChapter" required>
        <option value="">Select a Chapter</option>
        <!-- Chapters will be populated here based on the selected course -->
    </select>
    <label for="chapterName">Chapter Name:</label>
    <input type="text" name="chapterName" id="chapterName" required>
    <label for="file">Upload Chapter File:</label>
    <input type="file" name="file" id="file" required>
    <input type="submit" value="Upload Chapter">
</form>


<h2>Add Pages to Chapter</h2>
<form action="upload_pages.php" method="post">
    <label for="selectCourse">Select Course:</label>
    <select name="courseID" id="selectCourse" required onchange="fetchChapters(this.value, 'selectChapter')">
        <option value="">Select a Course</option>
        <?php foreach ($courses as $course): ?>
            <option value="<?php echo $course['courseID']; ?>"><?php echo $course['courseName']; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="selectChapter">Select Chapter:</label>
    <select name="chapterID" id="selectChapter" required>
        <option value="">Select a Chapter</option>
        <!-- Chapters will be populated here based on the selected course -->
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
