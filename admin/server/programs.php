<?php
include '../../server/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $program_name = $_POST['program_name'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO programs (program_name, duration) VALUES ('$program_name', '$duration')";

    if ($conn->query($sql) === TRUE) {
        echo "Program added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>