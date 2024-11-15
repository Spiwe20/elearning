<?php
include 'db.php';

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