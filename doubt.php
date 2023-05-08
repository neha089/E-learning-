<?php
require_once "database.php";
$Name = $_POST['name'];
$Email = $_POST['email'];
$Subject = $_POST['subject'];
$Query = $_POST['query'];


if (!$con) {
    die("conection failed: " . mysqli_connect_error());
}

$stmt = mysqli_prepare($con, "INSERT INTO doubt (name, email, subject, query) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssss", $Name, $Email, $Subject, $Query);

if (mysqli_stmt_execute($stmt)) {
    echo 'Successfully submitted';
} else {
    die("Something terrible happened. Please try again.");
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>