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
    $pass = $_POST['password'];

    $email = stripslashes($email);
    $email = mysqli_real_escape_string($con, $email);
    $pass = stripslashes($pass);
    $pass = mysqli_real_escape_string($con, $pass);

    // Check if the entered CAPTCHA is correct
    if (isset($_POST['cname']) && $_POST['cname'] === $_SESSION['CAPTCHA_CODE']) {
        // CAPTCHA is correct
        $stmt = $con->prepare("SELECT * FROM user WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ( $row['password']) {
                $_SESSION['logged'] = $email;
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                header('location: welcome.php?q=1');
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
                if ($row['password']) {
                    $_SESSION['logged'] = $email;
                    $_SESSION['email'] = $row['email'];
                    header('location: dashboard.php?q=0');
                    exit();
                } else {
                    $msg = "Invalid password";
                }
            } else {
                $msg = "Email and password do not match";
            }
        }
        $stmt->close();
    } else {
        // CAPTCHA is incorrect
        $msg = "Incorrect CAPTCHA";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Online E-Learning System</title>
    <!-- <link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="css/form.css"> -->
    <style type="text/css">
        body {
            width: 100%;
            background: #FFC0CB;
            /* set background color to pink */
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* set height to full viewport height */
            text-align: center;
            /* center align text */
        }
    </style>
</head>

<body>
    <center>
        <h5 style="font-family: Noto Sans;">Login to </h5>
        <h4 style="font-family: Noto Sans;">Online E-Learning System</h4>
    </center>
    <br>
    <form method="post" action="login.php" enctype="multipart/form-data">
        <div class="form-group">
            <label><h2>Enter Your Email Id:</h2></label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label class="fw"><h2>Enter Your Password:</h2></label>
            <input type="password" name="password" class="form-control">
        </div>
        <label for="lname">Enter CAPTCHA:</label><br>
        <input type="text" id="lname" name="cname" required><br><br> 
        <img src="captcha.php" alt="CAPTCHA Image">
        <div class="form-group text-right">
            <button class="btn btn-primary btn-block" name="submit">Login</button>
        </div>
        <div class="form-group text-center">
            <span class="text-muted"><h3>Don't have an account?</span></h3>
            <a href="register.php">Register</a> Here..
        </div>
    </form>
    <p><?php echo $msg; ?></p>

    <script src="js/jquery.js"></script>
    <script src="scripts/bootstrap/bootstrap.min.js"></script>
</body>
</html>
