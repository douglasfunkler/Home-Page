<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Home Page</h2>
</div>
<div class="content">

    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php if (isset($_SESSION['username'])) : ?>
        <p>Hello <strong><?php echo $_SESSION['username']; ?></strong></p>
        <center>
            <button type="button" class="btn btn-primary"><a href="http://localhost:8080/bookings">Welcome</button>
            </a></center>
        <p>
            <button type="button" class="btn btn-primary"><i class="fa fa-sign-out fa-lg"></i><a href="/index.html"
                                                                                                 style="color: red;">logout
            </button>
            </a></p>
    <?php endif ?>
</div>
</body>
</html>