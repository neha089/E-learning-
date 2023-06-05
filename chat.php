<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | E-lEARNING</title>
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="css/welcome.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
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

        <!-- Collect the nav links, forms, and other content for toggling -->
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
 <?php
// chat.php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: login.php"); // Redirect to the login page if not logged in
  exit();
}

// Fetch all logged-in user emails
require_once "database.php";
$currentUserEmail = $_SESSION['email'];

$query = "SELECT email FROM user";
$result = mysqli_query($con, $query);
$userEmails = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Chat Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 20px;
    }

    h2 {
      color: #333;
    }

    #chatbox {
      width: 400px;
      height: 300px;
      overflow-y: scroll;
      border: 1px solid #ccc;
      padding: 10px;
      background-color: #fff;
    }

    #chatbox p {
      margin: 5px 0;
    }

    form {
      margin-top: 20px;
    }

    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #333;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <h2 style="color:white">Chat Page</h2>
  <div id="chatbox">
    <?php
    // Fetch chat messages from the database
    $query = "SELECT * FROM chat_messages WHERE sender_email = '$currentUserEmail' OR receiver_email = '$currentUserEmail' ORDER BY created_at ASC";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      $senderEmail = $row['sender_email'];
      $receiverEmail = $row['receiver_email'];
      $message = $row['message'];

      // Get the sender's name
      $senderQuery = "SELECT name FROM user WHERE email = '$senderEmail'";
      $senderResult = mysqli_query($con, $senderQuery);
      if ($senderResult && mysqli_num_rows($senderResult) > 0) {
        $senderName = mysqli_fetch_assoc($senderResult)['name'];
      } else {
        $senderName = "Unknown";
      }

      // Get the receiver's name
      $receiverQuery = "SELECT name FROM user WHERE email = '$receiverEmail'";
      $receiverResult = mysqli_query($con, $receiverQuery);
      if ($receiverResult && mysqli_num_rows($receiverResult) > 0) {
        $receiverName = mysqli_fetch_assoc($receiverResult)['name'];
      } else {
        $receiverName = "Unknown";
      }

      if ($receiverEmail == 'all') {
        echo "<p><strong>{$senderName} to all:</strong> {$message}</p>";
      } else {
        echo "<p><strong>{$senderName} to {$receiverName}:</strong> {$message}</p>";
      }
    }
    ?>
  </div>
  <form method="post" action="send_message.php">
    <select name="receiver_email[]" multiple required>
      <option value="">Select Receiver Email(s)</option>
      <option value="all">All</option>
      <?php foreach ($userEmails as $user) : ?>
        <option value="<?php echo $user['email']; ?>"><?php echo $user['email']; ?></option>
      <?php endforeach; ?>
    </select><br>
    <textarea name="message" placeholder="Type your message..." required></textarea><br>
    <input type="submit" name="submit" value="Send">
  </form>
</body>
</html>
