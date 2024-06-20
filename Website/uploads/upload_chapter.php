<?php
include 'databasecon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file']) && isset($_POST['courseID'])) {
    $file = $_FILES['file'];
    $courseID = (int)$_POST['courseID'];
    $chapterName = $conn->real_escape_string($_POST['chapterName']);

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Upload failed with error code " . $file['error']);
    }

    // Define the upload directory and file path
    $uploadDir = 'uploads/';
    $filePath = $uploadDir . basename($file['name']);

    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Move the uploaded file to the upload directory
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        $filePath = $conn->real_escape_string($filePath);

        // Insert the chapter metadata into the database
        $stmt = $conn->prepare("INSERT INTO chapters (courseID, chapterName, path) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $courseID, $chapterName, $filePath);

        if ($stmt->execute()) {
            echo "Chapter uploaded and stored successfully.";
        } else {
            echo "Failed to upload and store the chapter: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to move uploaded file.";
    }
}

$conn->close();
?>
