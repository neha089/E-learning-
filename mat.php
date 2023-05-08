<?php

// conect to the database
require_once "database.php";



if (!$con) {
    die('conection failed: ' . mysqli_conect_error());
}

// Get the ID of the file from the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
} else {
    die('ID not specified');
}

// Fetch the file from the database
$sql = "SELECT Name, Date, file, directory FROM material WHERE id = '$id'";
$result = mysqli_query($con, $sql);

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
    case 'png':
    case 'gif':
        header('Content-type: image/' . $file_extension);
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
        header('Content-type:video/mp4');
        break;
    default:
        die('Unsupported file type');
}

// Set the content disposition and transfer encoding headers
header('Content-Disposition: inline; filename="' . $file_name . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
header('Content-Length: ' . filesize($file_path));

// Output the file
readfile($file_path);
exit();

?>
