<?php
include("database.php");
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = stripslashes($name);
    $name = addslashes($name);

    $email = $_POST['email'];
    $email = stripslashes($email);
    $email = addslashes($email);

    $password = $_POST['password'];
    $password = stripslashes($password);
    $password = addslashes($password);
  
    $college = $_POST['college'];
    $college = stripslashes($college);
    $college = addslashes($college);

    $userCaptcha = $_POST['cname'];
    $storedCaptcha = $_SESSION['CAPTCHA_CODE'];

    if ($userCaptcha !== $storedCaptcha) {
        echo "<center><h3><script>alert('Invalid CAPTCHA code');</script></h3></center>";
        header("refresh:0;url=register.php");
    } else {
        // Hash the password
        $hashedPassword = $password;

        $stmt = $con->prepare("SELECT email FROM user WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<center><h3><script>alert('Sorry.. This email is already registered!');</script></h3></center>";
            header("refresh:0;url=login.php");
        } else {
            $stmt = $con->prepare("INSERT INTO user (name, email, password, college) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $hashedPassword, $college);
            if ($stmt->execute()) {
                echo "<center><h3><script>alert('Congrats.. You have successfully registered!');</script></h3></center>";
                header('location: welcome.php?q=1');
            } else {
                echo "<center><h3><script>alert('Registration failed. Please try again.');</script></h3></center>";
                header("refresh:0;url=register.php");
            }
        }
        $stmt->close();
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Online E-Learning System</title>
    <link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body background="blog-8.jpg">

<section class="login first grey">
    <div class="container">
        <div class="box-wrapper">
            <div class="box box-border">
                <div class="box-body">
                    <center>
                        <h5>Register to</h5>
                        <h4>Online E-Learning System</h4>
                    </center><br>
                    <form method="post" action="register.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Enter Your Username:</label>
                            <input type="text" name="name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Enter Your Email Id:</label>
                            <input type="email" name="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Enter Your Password:</label>
                            <input type="password" name="password" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Enter Your College Name:</label>
                            <input type="text" name="college" class="form-control" required />
                        </div>
                        <label for="lname">Enter CAPTCHA:</label><br>
                        <p style="color:black"><input type="text" id="lname" name="cname" required></p><br><br> 
                        <img src="captcha.php" alt="CAPTCHA Image">
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-block" name="submit">Register</button>
                        </div>
                        <div class="form-group text-center">
                            <span class="text-muted">Already have an account! </span> <a href="login.php">Login  Here.. </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.js"></script>
<script src="scripts/bootstrap/bootstrap.min.js"></script>
</body>
</html>
