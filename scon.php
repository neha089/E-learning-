<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome | E-Learning System</title>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
  <link rel="stylesheet" href="css/welcome.css">
  <link rel="stylesheet" href="css/font.css">
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <style>
    /* Custom CSS styling */
    body {
      background-color: black;
      color: white;
    }
    .container {
      margin-top: 20px;
    }
    .card {
      background-color: white;
      margin-bottom: 20px;
      border-radius: 0.1cm;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    .card-title {
      color: black;
      font-size: 24px;
      font-weight: bold;
    }
    .card-content {
      color: black;
      font-size: 18px;
      line-height: 1.5;
    }
    .card-footer {
      color: black;
      font-size: 14px;
    }
  </style>
</head>
<body>
 
    <!-- Navbar code here --> <head>
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
            <li><a href="logout.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br>

  </nav>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
      
      <?php
// session_start();
require_once "database.php";

// Get all study content from the database
$result = mysqli_query($con, "SELECT * FROM study_content ORDER BY id DESC");
while ($content = mysqli_fetch_assoc($result)) {
    // Get the admin name from the session (assuming you store it there)
    $adminResult = mysqli_query($con, "SELECT email FROM admin");

    // Display the study content and admin name
    echo '<div class="card">';
    echo '  <div class="card-body">';
    echo '    <h5 class="card-title">' . $content['title'] . '</h5>';
    echo '    <p class="card-content">' . $content['content'] . '</p>';
    echo '    <p class="card-footer">Posted by: ';
    while ($row = mysqli_fetch_assoc($adminResult)) {
        echo $row['email'];
    }
    echo '    </p>';
    echo '  </div>';
    echo '</div>';
}
?>
