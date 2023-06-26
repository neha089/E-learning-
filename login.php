<?php
require('database.php');
session_start();

if (isset($_SESSION["email"])) {
    session_destroy();
}

$ref = @$_GET['q'];
$msg = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = stripslashes($email);
    $email = mysqli_real_escape_string($con, $email);

    $password = stripslashes($password);
    $password = mysqli_real_escape_string($con, $password);

    $stmt = $con->prepare("SELECT * FROM user WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // echo "Input Password: " . $password . "<br>";
        // echo "Hashed Password from Database: " . $hashedPassword . "<br>";

        if ($password==$row['password']) {
            $_SESSION['logged'] = $email;
            $_SESSION['email'] = $row['email'];
            header('location: welcome.php?q=8');
            exit();
        } else {
            $msg = "Invalid password";
        }
    } else {
        $stmt = $con->prepare("SELECT email, password FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

           

            if ($password) {
                $_SESSION['logged'] = $email;
                $_SESSION['email'] = $row['email'];
                header('location: dashboard.php?q=0');
                exit();
            } else {
                $msg = "Invalid password";
            }
        } else {
            $msg = "Email and password do not match please regitre first ";
        }
    }
    $stmt->close();

    
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login | Online E-Learning System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <h1>Login to Online E-Learning System</h1><br><br><br>
    <form method="post" action="login.php">
        <div class="form-group">
            <label>Enter Your Email Id:</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Enter Your Password:</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="lname">Enter CAPTCHA:</label>
            <input type="text" id="lname" name="cname" required><br><br> 
            <img src="captcha.php" alt="CAPTCHA Image">
        </div>
        <button name="submit" class="btn">Login</button>
        <h3>Don't have an account?</h3>
        <a href="register.php">Register</a> Here.
    </form>
    <p><?php echo $msg; ?></p>

    <script src="js/jquery.js"></script>
    <script src="scripts/bootstrap/bootstrap.min.js"></script>
</div>
</body>
</html>
