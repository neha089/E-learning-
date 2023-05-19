<?php
require_once "database.php";

$Name = isset($_POST['name']) ? $_POST['name'] : '';
$Email = isset($_POST['email']) ? $_POST['email'] : '';
$Subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$Query = isset($_POST['query']) ? $_POST['query'] : '';

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

