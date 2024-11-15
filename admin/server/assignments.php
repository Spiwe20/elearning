<?php
include '../../server/db.php';

// Handle form submission for creating or updating assignments
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['assignment-id'];
    $program = $_POST['program'];
    $year = $_POST['year'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    if ($id) {
        // Update assignment
        $sql = "UPDATE assignments SET program_id='$program', year='$year', title='$title', description='$description' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Assignment updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Create new assignment
        $sql = "INSERT INTO assignments (program_id, year, title, description) VALUES ('$program', '$year', '$title', '$description')";
        if ($conn->query($sql) === TRUE) {
            echo "Assignment created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Handle assignment deletion
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];
    $sql = "DELETE FROM assignments WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Assignment deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch assignments from the database
$sql = "SELECT a.id, p.program_name, a.year, a.title, a.description FROM assignments a JOIN programs p ON a.program_id = p.id";
$result = $conn->query($sql);

$assignments = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $assignments[] = $row;
    }
}

echo json_encode($assignments);
?>