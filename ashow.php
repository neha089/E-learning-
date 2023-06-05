<html>
    <style>
body{
  background-color: black;
margin:auto;
text-align:center;
color:white}
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
      color:white
    }
    .nav-items a {
      text-decoration: none;
      color:yellowgreen;
      padding: 35px 20px;
    }
</style>
<div class="header">
<h2 style="color:white">Online E-learningSystem</h2>
 <?php if(@$_GET['q']==0) ?>
<a style="color:white" href="dashboard.php?q=0">Home</a>
<nav class="nav-items">
 <?php if(@$_GET['q']==1) ?>
<a style="color:white" href="dashboard.php?q=1">User</a>
 <?php if(@$_GET['q']==2)  ?>
<a style="color:white" href="dashboard.php?q=2">Ranking</a>
 <?php if(@$_GET['q']==4 || @$_GET['q']==5) ?>
<a style="color:white" href="dashboard.php?q=4">Add Quiz</a>
<a style="color:white" href="dashboard.php?q=5">Remove Quiz</a>
<?php if(@$_GET['q']==6) ?>
 <a style="color:white" href="cont.php?q=6">Add Content</a>
<?php if(@$_GET['q']==7) ?>
 <a style="color:white" href="admin.php?q=7">Show Doubt</a>
<?php if(@$_GET['q']==10)?>
<a  style="color:white"href="index1.php?q=10">Add Files</a>
<?php if(@$_GET['q']==9) ?>
<a style="color:white" href="ashow.php?q=9">Show Files</a>
 <a style="color:white" href="logout1.php?q=dashboard.php">Logout</a>
</nav>
</div>
<?php
include_once "database.php";

if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$query = "SELECT * FROM files";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>File List</title>
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
    <h2>File List</h2>
    <?php if (mysqli_num_rows($result) > 0) : ?>
        <table>
            <tr>
                <th>Email</th>
                <th>Title</th>
                <th>File</th>
                <th>Type</th>
                <th>Date</th>
                <th>Download</th>
                <th>View</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['file_name']; ?></td>
                    <td><?php echo $row['file_type']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><a href="<?php echo $row['file_path']; ?>" download>Download</a></td>
                    <td><a href="<?php echo $row['file_path']; ?>" target="_blank">View</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else : ?>
        <p>No data found</p>
    <?php endif; ?>

    <?php mysqli_close($con); ?>
</body>
</html>
