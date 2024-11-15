<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['program_name'])) {
        $program_name = $_POST['program_name'];
        $sql = "INSERT INTO degree_programs (program_name) VALUES ('$program_name')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Degree program added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if (isset($_POST['year_name'])) {
        $year_name = $_POST['year_name'];
        $sql = "INSERT INTO years_of_study (year_name) VALUES ('$year_name')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Year of study added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
