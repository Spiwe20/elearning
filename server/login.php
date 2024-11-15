<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Start a session and set session variables
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name']; // Store the student's name in the session

            // Redirect to the student dashboard
            header("Location: ../students/dashboard.html");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found";
    }
}
?>