<?php
session_start();
include '../backend/config/dbconnect.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $login_query = "SELECT * FROM customer WHERE Email='$email' AND Password='$pass' limit 1";
    $login_query_run = mysqli_query($con, $login_query);

    $row = mysqli_fetch_assoc($login_query_run);

    if ($row["Email"] == "admin@gmail.com") {
        header('Location: ../frontend/AdmiUi/Home.php');
        // Admin 
    } elseif (mysqli_num_rows($login_query_run) == 1) {
        header('Location: ../frontend/website/web.php');

        // user
    } else {
        header('Location: ../frontend/login/login.php');
        $_SESSION['Lmessage_error'] = "Your Email or Password Incorrect.";
    }
}
