<?php
session_start();
require_once('../backend/config/dbconnect.php');
// Data Register data store section
if (isset($_POST['register_btn'])) {
    $fname      =    mysqli_real_escape_string($con, $_POST['fname']);
    $email       =    mysqli_real_escape_string($con, $_POST['email']);
    $number    =    mysqli_real_escape_string($con, $_POST['number']);
    $password =    mysqli_real_escape_string($con, $_POST['password']);
    $rpassword =   mysqli_real_escape_string($con, $_POST['rpassword']);

    if (empty($fname) || empty($email) ||  empty($number) ||  empty($password) || empty($rpassword)) {
        echo "Please Fill blank";
    }
    if ($password != $rpassword) {
        $_SESSION['passwordError'] = "Password Is Not Matching";
        header('Location: ../frontend/register/register.php');
        exit(0);
    } else {
        // $pass = md5($password); //Password encryption a method
        $sql = "INSERT INTO customer(cName,Email,Number,Password) VALUES(' $fname','$email','$number','$password')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header("Location: ../frontend/login/login.php");
            // print_r($sql);
        } else {
            echo 'Please Check your Query';
        }
    }
}
// include('../frontend/login/login.php')
