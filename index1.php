<!DOCTYPE html>

<html>

<head>

	<title>Upload Material</title>

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

<h1>Upload Material</h1>
	
<form method="post" enctype="multipart/form-data" action="aupload.php">
		
<textarea name="title"cols="45" rows="8"placeholder="Enter Title" required></textarea><br><br>	<input type="file" name="file" required>		
<input type="submit" name="submit" value="Upload">
	
</form>

</body>

</html>