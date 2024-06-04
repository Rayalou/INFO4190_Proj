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
$registrationModel = new RegistrationModel($servername, $username, $password, $db);
$registrationController = new RegistrationController($servername, $username, $password, $db);

// Create instances of the login controller and model
$loginModel = new LoginModel($servername, $username, $password, $db);
$loginController = new LoginController($servername, $username, $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is for registration or login
    if (isset($_POST['register'])) {
        // Handle registration
        $registrationController->handleRegistration();
    } elseif (isset($_POST['login'])) {
        // Handle login
        $loginController->handleLogin();
    }
}

// Close connections
$registrationModel->closeConnection();
$loginModel->closeConnection();
?>