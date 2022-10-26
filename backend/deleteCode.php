<?php include '../backend/config/dbconnect.php' ?>
<?php
if (isset($_POST['deletebtn'])) {
    $id = $_POST['delete_id'];
    $delete_query = "DELETE FROM customer WHERE ID='$id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if ($delete_query_run) {

        header("Location: ../frontend/AdmiUi/Customers.php");
    } else {
        $_SESSION["delete_error_msg"] = "Please agin check..!";
        echo "error";
        header("Location: ../frontend/AdmiUi/Customers.php");
    }
}
?>