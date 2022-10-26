<?php
session_start();
include '../../backend/config/dbconnect.php';
// check the id and image_name is set or not
if (isset($_GET['id']) && isset($_GET['image_name'])) {
    // get value delete
    // echo "Deleted...";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // Remove the image file is available
    if ($image_name != "") {
        // image available delete it
        $path = "../../images/category/" . $image_name;

        // remove the image
        $remove = unlink($path);

        // If failed remove img display error and stop
        if ($remove = false) {
            // set session message
            $_SESSION['remove'] = "Failed to remove category";

            // redirect mange category page 
            header("Location: ../AdmiUi/manage-category.php");
            // stop Process
            die();
        }
    }
    // Delete data from db
    $sql = "DELETE FROM category WHERE id=$id";
    // execute query

    $res = mysqli_query($con, $sql);
    // redirect to mange category page mange

    // check wether the data is delete from db or not
    if ($res == true) {
        // set success Message and redirect
        $_SESSION['deleted'] = "Successfully deleted Category...!";
        // redirect manage category
        header("Location: ../AdmiUi/manage-category.php");
    } else {
    }
} else {
    // redirect mange cat page
    $_SESSION['deleted'] = "Failed to delete category....!";
    header('Location: ../AdmiUi/manage-category.php');
}
