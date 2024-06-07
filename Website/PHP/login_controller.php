<?php
class LoginController {
    private $loginModel;

    public function __construct($servername, $username, $password, $db) {
        $this->loginModel = new LoginModel($servername, $username, $password, $db);
    }
	
	public function handleLogin() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $isAuthenticated = $this->loginModel->authenticateUser($email, $password);

        if ($isAuthenticated) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
			
			$user_name = $this->loginModel->getUserName($email);
            $_SESSION["user_name"] = $user_name;

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid email or password";
        }
    }
}

    public function closeConnection() {
        $this->loginModel->closeConnection();
    }
}
?>