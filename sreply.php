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
  <body style="background-color:black; color:white">
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
include_once 'database.php';

if (isset($_POST['reply']) && isset($_POST['email'])) {
    $reply = $_POST['reply'];
    $email = $_POST['email'];

    // update the doubt with the admin's reply
    $sql = "UPDATE doubt SET reply='$reply' WHERE email='$email'";
    if (mysqli_query($con, $sql)) {
        echo "Reply submitted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

$result = mysqli_query($con, "SELECT * FROM doubt");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doubts</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Doubts</h2>
    <table>
        <tr>
           
            <th>Email</th>
            <th>Subject</th>
            <th>Query</th>
            <th>Admin Reply</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['query']; ?></td>
                <td><?php echo $row['reply']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
