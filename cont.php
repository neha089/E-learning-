<?php
session_start();
include_once 'database.php';
if (mysqli_connect_errno()) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $sql = "INSERT INTO study_content (title, content) VALUES ('$title', '$content')";
  if (mysqli_query($con, $sql)) {
           $_SESSION['success'] = "Study content added successfully!";
  } 
  else {
         $_SESSION['error'] = "Failed to add study content: " . mysqli_error($con);
  }
  header("Location: cont.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Study Content</title>
</head>
<style>
body{background-color:#0b9164;
margin:auto;
text-align:center;}
 .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
     background-image:linear-gradient(#00004d 55%,#0000);/*,#000033 30%*/
    }
    .header .logo {
      font-size: 25px;
      font-family: 'Sriracha', cursive;
      color: #000;
      text-decoration: none;
      margin-left: 30px;
    }
    .header h2{
     color:yellowgreen;
}
    .nav-items {
      display: flex;
      justify-content: space-around;
      align-items: center;
      margin-right: 20px;
    }
    .nav-items a {
      text-decoration: none;
      color:yellowgreen;
      padding: 35px 20px;
    }
    
</style>
<body>
<div class="header">
<h2>Online E-learningSystem</h2>
 <?php if(@$_GET['q']==0) ?>
<a href="dashboard.php?q=0">Home</a>
<nav class="nav-items">
 <?php if(@$_GET['q']==1) ?>
<a href="dashboard.php?q=1">User</a>
 <?php if(@$_GET['q']==2)  ?>
<a href="dashboard.php?q=2">Ranking</a>
 <?php if(@$_GET['q']==4 || @$_GET['q']==5) ?>
<a href="dashboard.php?q=4">Add Quiz</a>
<a href="dashboard.php?q=5">Remove Quiz</a>
<?php if(@$_GET['q']==6) ?>
 <a href="cont.php?q=6">Add Content</a>
<?php if(@$_GET['q']==7) ?>
 <a href="admin.php?q=7">Show Doubt</a>
<?php if(@$_GET['q']==10)?>
<a href="index1.php?q=10">Add Files</a>
<?php if(@$_GET['q']==9) ?>
<a href="ashow.php?q=9">Show Files</a>
 <a href="logout1.php?q=dashboard.php">Logout</a>
</nav>
</div>
<body>
  <h1>Add Study Content</h1>
  <?php if (isset($_SESSION['success'])): ?>
    <div style="color: green"><?php echo $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
  <?php endif; ?>
  <?php if (isset($_SESSION['error'])): ?>
    <div style="color: red"><?php echo $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
  <?php endif; ?>
  <form method="post">
    <textarea name="title"cols="45" rows="2"placeholder="Enter Title" required></textarea><br><br>
    <textarea name="content" cols="45" rows="10" placeholder="Add Content"required></textarea><br><br>
    <input type="submit" value="Add Study Content">
  </form>
</body>
</html>