<?php

// Connect to the database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'my_db';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Get the ID of the file from the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
} else {
    die('ID not specified');
}

// Fetch the file from the database
$sql = "SELECT Name, Date, file, directory FROM material WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $file_name = $row['file'];
    $file_path = $row['directory'];
} else {
    die('File not found');
}

// Determine the file type based on the file extension
$file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
// Set the appropriate content type header
switch ($file_extension) {
    case 'pdf':
        header('Content-type: application/pdf');
        break;
    case 'jpg':
    case 'jpeg':
        header('Content-type: image/jpeg');
        break;
    case 'png':
        header('Content-type: image/png');
        break;
    case 'gif':
        header('Content-type: image/gif');
        break;
    case 'txt':
        header('Content-type: text/plain');
        break;
    case 'cpp':
        header('Content-type: cpp');
        break;
     case 'php':
        header('Content-type: php');
        break;
     case 'html':
        header('Content-type: html');
        break;
    case 'mp4':
        header('Content-type: video/mp4');
        break;
    default:
        die('Unsupported file type');
}

// Set the content disposition header to force download
header('Content-Disposition: attachment; filename="' . $file_name . '"');

// Read the file and output it to the browser
readfile($file_path);
?>