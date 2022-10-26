<?php
include './config/dbconnect.php';
include '../frontend/main.php';
if (isset($_POST["editData"])) {
    $id = $_POST['up_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['pass'];

    $update_query = "UPDATE customer
    SET cName='$name', Email='$email', Number='$number', Password='$password' 
    WHERE ID='$id'";

    $update_query = mysqli_query($con,  $update_query);

    if ($update_query) {
        header('Location: ../frontend/AdmiUi/Customers.php');
    } else {
        $_SESSION['Update_error_message'] = "Your Data Was Not Successfully Saved";
        header('Location: ../frontend/Modal/Update.php');
    }
}
