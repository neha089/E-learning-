<?php
require_once "database.php";

// Get the study content from the database
$result = mysqli_query($con, "SELECT * FROM study_content ORDER BY id DESC LIMIT 1");
$content = mysqli_fetch_assoc($result);

// Get the admin name from the session (assuming you store it there)
session_start();
$result = mysqli_query($con, "SELECT email FROM admin");

// Loop through the result set and print the email id


// Display the study content and admin name
echo"subject title";
echo '<h3>' . $content['title'] . '</h3>';
echo"content/comment";
echo '<p>' . $content['content'] . '</p>';
echo"posted by:";
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['email'];
  }
  

?>
