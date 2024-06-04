<?php
class RegistrationModel {
    private $conn;

    public function __construct($servername, $username, $password, $db) {
        $this->conn = new mysqli($servername, $username, $password, $db);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function registerUser($name, $email, $password, $confirmPassword) {
        if ($password !== $confirmPassword) {
            die("Error: Passwords do not match");
        }

        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password); // No hashing

        $sql = "INSERT INTO students (studentName, studentEmail, studentPassword) VALUES ('$name', '$email', '$password')";

        if ($this->conn->query($sql) === TRUE) {
            return "Registration successful!";
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>