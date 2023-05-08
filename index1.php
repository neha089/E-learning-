<?php include "upload.php";?>
<title>PHP Image Upload Example</title>
<form action="" method="post" enctype="multipart/form-data">
    <!---<input type="file" name="fileUpload" id="chooseFile">	//single file--->
	<input type="file" name="fileUpload[]" id="chooseFile" multiple>	//multiple file 
    <button type="submit" name="submit">Upload File</button>
</form>
<h3>For Download Uploaded file:<a href="download.php">Download</a></h3>
<!-- Display response messages -->
<?php if(!empty($resMessage)) {
    echo $resMessage['message'];
}
?>

