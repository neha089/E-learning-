<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | E-lEARNING SYSTEM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
  </head>
  <body style="background-color:black;text-align:center">
    <nav class="navbar navbar-default title1">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><b>Online E Learning System</b></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-left">
          <li <?php if(@$_GET['q']==8) echo 'class="active"'; ?> >
  <a href="welcome.php?q=8">
    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;HOME<span class="sr-only">(current)</span>
  </a>
</li>
<li <?php if(@$_GET['q']==1) echo 'class="active"'; ?> >
  <a href="welcome.php?q=1">
    <span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;QUIZ<span class="sr-only"></span>
  </a>
</li>
<li <?php if(@$_GET['q']==2) echo 'class="active"'; ?> >
  <a href="welcome.php?q=2">
    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History
  </a>
</li>
<li <?php if(@$_GET['q']==3) echo 'class="active"'; ?> >
  <a href="welcome.php?q=3">
    <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking
  </a>
</li>
<li <?php echo 'class="active"'; ?> >
  <a href="doubt.php">
    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;Doubt
  </a>
</li>
<li <?php echo 'class="active"'; ?> >
  <a href="mat.php">
    <span class="glyphicon glyphicon-book" aria-hidden="true"></span>&nbsp;Material
  </a>
</li>
<li <?php echo 'class="active"'; ?> >
  <a href="upload.php">
    <span class="glyphicon glyphicon-upload" aria-hidden="true"></span>&nbsp;File Upload
  </a>
</li>
<li <?php echo 'class="active"'; ?> >
  <a href="sreply.php">
    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;Show Reply
  </a>
</li>
<li <?php echo 'class="active"'; ?> >
  <a href="scon.php">
    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;Show Content
  </a>
</li>
<li <?php echo 'class="active"'; ?> >
  <a href="chat.php">
    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;chat
  </a>
</li>

</ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br>


	<?php
session_start();
// Check if form is submitted
include_once "database.php";

$successMessage = '';
$errorMessage = '';

if (isset($_POST['submit'])) {
    $email = $_SESSION['email'];
    $title = $_POST['title'];

    // Upload file to server
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_path = "upload/" . $file_name;
    move_uploaded_file($file_tmp, $file_path);

    // Insert data into database
    $created_at = date('Y-m-d H:i:s');
    $query = "INSERT INTO files (email, title, file_name, file_type, file_size, file_path, created_at) VALUES ('$email', '$title', '$file_name', '$file_type', '$file_size', '$file_path', '$created_at')";
    $result = mysqli_query($con, $query);
    if ($result) {
        $successMessage = "File uploaded and data inserted successfully";
    } else {
        $errorMessage = "Error: " . $query . "<br>" . mysqli_error($con);
    }
}
?>

<!-- Rest of the HTML code -->

<section style="color:white">
    <h1>Upload Material</h1>
    <?php
    if ($successMessage) {
        echo '<p style="color: white">' . $successMessage . '</p>';
    } elseif ($errorMessage) {
        echo '<p style="color: white">' . $errorMessage . '</p>';
    }
    ?>
    <form method="post" enctype="multipart/form-data" action="upload.php">
        <label for="title">Title:</label><br>
        <p style="color:black"><input type="text" name="title" required></p><br><br>
        <label for="text">File:</label><br>
        <center><input type="file" name="file" required><br><br></center>
        <p style="color:black"><input type="submit" name="submit" value="Upload"></p>
    </form>
</section>
</body>
</html>
