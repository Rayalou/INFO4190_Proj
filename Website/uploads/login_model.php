<?php
class LoginModel {
    private $conn;

    public function __construct($servername, $username, $password, $db) {
        // Create connection
        $this->conn = mysqli_connect($servername, $username, $password, $db);

        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

	public function authenticateUser($email, $password) {
    // Escape email to prevent SQL injection
    $email = mysqli_real_escape_string($this->conn, $email);

    // Query to authenticate user from students table
    $sql = "SELECT studentID, studentEmail, studentPassword FROM students WHERE studentEmail='$email'";
    $result = mysqli_query($this->conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user's password from the database
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['studentPassword'];

        // Verify the password
        if ($password === $storedPassword) {
            return ['authenticated' => true, 'studentID' => $row['studentID']];
        }
    }

    return ['authenticated' => false];
}
	
	public function getUserName($email) {
    $email = mysqli_real_escape_string($this->conn, $email);
    $sql = "SELECT studentName FROM students WHERE studentEmail = '$email'";
    $result = mysqli_query($this->conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['studentName'];
    }

    return null;
}

    public function closeConnection() {
        // Close the database connection
        mysqli_close($this->conn);
    }
}
?>