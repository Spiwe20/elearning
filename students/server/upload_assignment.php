<?php
include '../../server/db.php';

$program_id = $_POST['program_id'];
$file = $_FILES['assignment-file'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($file["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($file["size"] > 5000000) { // 5MB limit
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$allowedTypes = array("jpg", "png", "jpeg", "gif", "pdf", "doc", "docx");
if (!in_array($fileType, $allowedTypes)) {
    echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, and DOCX files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $sql = "INSERT INTO assignments (program_id, title, description, file_path) 
                VALUES ('$program_id', 'Uploaded Assignment', 'Uploaded via form', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "Assignment uploaded successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>