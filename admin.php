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
th {color:white;}
td {color:yellow;}
table, th, td {
  border:0.09px solid GreenYellow;
  text-align:center;
  font-size:125%;
  padding:9px 9px;
margin:auto;
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
</html>
<?php
    include_once 'database.php';
    if(isset($_POST['reply']) && isset($_POST['email'])) {
        $reply = $_POST['reply'];
        $email = $_POST['email'];
        
        // update the doubt with the admin's reply
        $sql = "UPDATE doubt SET reply='$reply' WHERE email='$email'";
        if(mysqli_query($con, $sql)) {
            echo "Reply submitted successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
    
    $result = mysqli_query($con, "SELECT * FROM doubt");
?>
<div class="panel">
<div class="table-responsive">
<table class="table table-striped title1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Query</th>
        <th>Admin Reply</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_array($result)) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['subject']; ?></td>
        <td><?php echo $row['query']; ?></td>
        <td><?php echo $row['reply']; ?></td>
        <td>
            <form method='post'>
                <input type='text' name='reply' placeholder='Enter reply'>
                <input type='hidden' name='email' value='<?php echo $row['email']; ?>'>
                <button type='submit'>Submit</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table></div></div>