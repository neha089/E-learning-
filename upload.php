<?php
// Database connection
include "database.php";

if (isset($_POST["submit"])) {
	// Count total files
	$countfiles = count($_FILES['fileUpload']['name']);
	
	// Looping all files
	for($i=0;$i<$countfiles;$i++){
		$target_dir = "img_dir/";
		$target_file = $target_dir . basename($_FILES["fileUpload"]["name"][$i]);
		
		if(move_uploaded_file($_FILES['fileUpload']['tmp_name'][$i],$target_file))
		{
			$sql = "INSERT INTO files (file_path) VALUES (?)";
            $stmt = mysqli_prepare($link, $sql);
			mysqli_stmt_bind_param($stmt, "s", $param_path);
			$param_path = $target_file;
            if (mysqli_stmt_execute($stmt)) {
                $resMessage = array(
                    "message" => "Files uploaded successfully.",
                );
            }
        } else {
            $resMessage = array(
                "message" => "File(s) coudn't be uploaded.",
            );
        }
			
		}
    
}
?>