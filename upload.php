<!DOCTYPE html>
<html>
<head>
	<title>Upload Material</title>
</head>
<body>
	<h1>Upload Material</h1>
	<form method="post" enctype="multipart/form-data" action="uupload.php">
	<label for="email">Email:</label><br>
		<input type="email" name="email" required><br><br>
		<label for="title">Title:</label><br>
		<input type="text" name="title" required><br><br>
		<label for="file">File:</label><br>
		<input type="file" name="file" required><br><br>
		<input type="submit" name="submit" value="Upload">
	</form>
</body>
</html>
