<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student-id'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $degree_program = $_POST['degree-program'];
    $year_of_study = $_POST['year-of-study'];

    $sql = "INSERT INTO users (sid, firstname, lastname, email, username, password, degree_program, year_of_study) 
            VALUES ('$student_id', '$first_name', '$last_name', '$email', '$username', '$password', '$degree_program', '$year_of_study')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the login page
        header("Location: ../login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT id, program_name FROM programs";
$result = $conn->query($sql);

$programs = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $programs[] = $row;
    }
}

echo json_encode($programs);
?>