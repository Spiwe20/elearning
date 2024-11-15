<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Start a session and set session variables
            session_start();
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_username'] = $row['username'];

            // Redirect to the dashboard
            header("Location: ../../admin/dashboard.html");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No admin found";
    }
}
?>
