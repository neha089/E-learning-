<?php
// Check if form is submitted
include_once"database.php";
if(isset($_POST['submit'])){

    $title = $_POST['title'];

    // Upload file to server
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_path = "upload/".$file_name;
    move_uploaded_file($file_tmp,$file_path);

    // Insert data into database
    $created_at = date('Y-m-d H:i:s');
    $query = "INSERT INTO material (title, file_name, file_type, file_size, file_path, created_at) VALUES ('$title', '$file_name', '$file_type', '$file_size', '$file_path', '$created_at')";
    $result = mysqli_query($con, $query);
    if($result){
        // File uploaded and data inserted successfully
        echo "File uploaded and data inserted successfully";
    } else {
        // Error in file upload or data insertion
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}
?>
