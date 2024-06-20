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

        // Generate a random integer student ID
        $studentID = random_int(100000, 999999); // Generates a 6-digit integer ID

        // Ensure the student ID is unique
        while ($this->isStudentIDExists($studentID)) {
            $studentID = random_int(100000, 999999); // Regenerate if not unique
        }

        $sql = "INSERT INTO students (studentID, studentName, studentEmail, studentPassword) VALUES ('$studentID', '$name', '$email', '$password')";

        if ($this->conn->query($sql) === TRUE) {
            return "Registration successful!";
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    private function isStudentIDExists($studentID) {
        $sql = "SELECT 1 FROM students WHERE studentID = '$studentID'";
        $result = $this->conn->query($sql);
        return $result->num_rows > 0;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>
