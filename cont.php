<?php
// Start a new session (optional)
session_start();

// Connect to the database
include_once 'database.php';

// Check for errors
if (mysqli_connect_errno()) {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the title and content from the form
  $title = $_POST['title'];
  $content = $_POST['content'];

  // Insert the new study content into the database
  $sql = "INSERT INTO study_content (title, content) VALUES ('$title', '$content')";
  if (mysqli_query($con, $sql)) {
    $_SESSION['success'] = "Study content added successfully!";
  } else {
    $_SESSION['error'] = "Failed to add study content: " . mysqli_error($con);
  }

  // Redirect back to this page
 
  header("Location: cont.php");
 
  exit();
}

// Display the form
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Study Content</title>
</head>
<body>
  <h1>Add Study Content</h1>
  <?php if (isset($_SESSION['success'])): ?>
    <div style="color: green;"><?php echo $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
  <?php endif; ?>
  <?php if (isset($_SESSION['error'])): ?>
    <div style="color: red;"><?php echo $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
  <?php endif; ?>
  <form method="post">
    <label for="title">Title:</label><br>
    <input type="text" name="title" required><br><br>
    <label for="content">Content:</label><br>
    <textarea name="content" rows="10" required></textarea><br><br>
    <input type="submit" value="Add Study Content">
  </form>
</body>
</html>
