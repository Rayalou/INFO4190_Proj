<?php

class RegistrationController {
    private $registrationModel;

    public function __construct($servername, $username, $password, $db) {
        $this->registrationModel = new RegistrationModel($servername, $username, $password, $db);
    }

    public function handleRegistration() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmpassword'];

            $result = $this->registrationModel->registerUser($name, $email, $password, $confirmPassword);

            echo $result;
        }
    }

    public function closeConnection() {
        $this->registrationModel->closeConnection();
    }
}
?>
