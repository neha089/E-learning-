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
  <body style="background-color:black">
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
        <li <?php echo''; ?> > <a href="logout.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>
        </ul>
       
        </div>
      </div>
    </nav>
    <br><br>

          
    
    <<?php
session_start();
require_once "database.php";


$Email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$Subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$Query = isset($_POST['query']) ? $_POST['query'] : '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = mysqli_prepare($con, "INSERT INTO doubt ( email, subject, query) VALUES ( ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss",  $Email, $Subject, $Query);

    if (mysqli_stmt_execute($stmt)) {
        $successMessage = '<p style="color:white">Successfully submitted</p>';
    } else {
        $errorMessage = "Something terrible happened. Please try again.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        h1{color:white;}
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 100px;
        }
    </style>
    <!-- Your head code here -->
</head>
<body>
    <h1><center><u>Doubt</u></center></h1>
    <?php
    if (isset($successMessage)) {
        echo '<p>' . $successMessage . '</p>';
    } elseif (isset($errorMessage)) {
        echo '<p>' . $errorMessage . '</p>';
    }
    ?>
    <div class="center">
    <form method="POST" action="doubt.php">

        <input type="text" name="subject" placeholder="Write subject"><br><br>
        <textarea name="query" rows="5" cols="35" placeholder="Write your Query"></textarea><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
