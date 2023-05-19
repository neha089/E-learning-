<?php
require_once "database.php";

if(isset($_POST['reply']) && isset($_POST['id'])) {
    $reply = $_POST['reply'];
    $id = $_POST['id'];
    
    // update the doubt with the admin's reply
    $sql = "UPDATE doubt SET admin_reply='$reply' WHERE id='$id'";
    if(mysqli_query($con, $sql)) {
        echo "Reply submitted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
