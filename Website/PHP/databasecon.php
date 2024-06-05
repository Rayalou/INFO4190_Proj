<?php
include 'register_model.php';
include 'register_controller.php';
include 'login_model.php';
include 'login_controller.php';

$servername = "localhost";
$username = "root";
$password = "";
$db = "cybersecurity_site";

// Create instances of the registration controller and model
$registrationController = new RegistrationController($servername, $username, $password, $db);

// Create instances of the login controller and model
$loginModel = new LoginModel($servername, $username, $password, $db);
$loginController = new LoginController($servername, $username, $password, $db);

function addChapter($servername, $username, $password, $db, $courseID, $chapterName, $contentFile) {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Read chapter content from the text file
    $chapterContent = file_get_contents($contentFile);
    if ($chapterContent === false) {
        die("Failed to read chapter content from file");
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO chapters (courseID, chapterName, chapterContent) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $courseID, $chapterName, $chapterContent);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New chapter record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is for registration or login
    if (isset($_POST['register'])) {
        // Handle registration
        $registrationController->handleRegistration();
    } elseif (isset($_POST['login'])) {
        // Handle login
        $loginController->handleLogin();
    } elseif (isset($_POST['addChapter'])) {
        // Handle adding a chapter
        $courseID = 1; // Assuming you're adding chapters to courseID 1
        $chapterName = "Introduction to Cybersecurity";
        $contentFile = 'chapter1_content.txt';
        
        addChapter($servername, $username, $password, $db, $courseID, $chapterName, $contentFile);
    }
}

// Close connections
$registrationController->closeConnection();
$loginModel->closeConnection();
?>
