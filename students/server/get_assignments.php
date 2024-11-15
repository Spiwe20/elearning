<?php
include '../../server/db.php';

$program_id = $_GET['program_id'];

$sql = "SELECT id, title, description, file_path FROM assignments WHERE program_id='$program_id'";
$result = $conn->query($sql);

$assignments = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $assignments[] = $row;
    }
}

echo json_encode($assignments);
?>