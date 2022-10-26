<?php include session_start(); ?>

<?php include '../../../backend/config/dbconnect.php';
if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name != "") {
        // image available delete it
        $path = "../../../images/Food/" . $image_name;

        $remove = unlink($path);

        if ($remove = false) {
            // set session message
            $_SESSION['remove_food'] = "Failed to remove Image File";

            // redirect mange category page
            header("Location: ../../AdmiUi/Foods.php");
            // stop Process
            die();
        }
    }
    // Delete data from db
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    // execute query

    $res = mysqli_query($con, $sql);
    // redirect to mange category page mange

    // check wether the data is delete from db or not
    if ($res == true) {
        // set success Message and redirect
        $_SESSION['deleted_food'] = "Successfully deleted Category...!";
        // redirect manage category
        header("Location: ../../AdmiUi/Foods.php");
    } else {
        $_SESSION['deleted_food_er'] = "Faild to Delete Food...!";

        header("Location: ../../AdmiUi/Foods.php");
    }
} else {
    // redirect mange cat page
    $_SESSION['deleted_food_error'] = "Failed to delete category....!";
    header('Location:  ../../AdmiUi/Foods.php');
}
