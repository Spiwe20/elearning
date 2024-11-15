<?php
include '../../server/db.php';

$sql = "SELECT p.id, p.program_name, COUNT(a.id) AS assignment_count 
        FROM programs p 
        LEFT JOIN assignments a ON p.id = a.program_id 
        GROUP BY p.id, p.program_name";
$result = $conn->query($sql);

$programs = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $programs[] = $row;
    }
}

echo json_encode($programs);
?>