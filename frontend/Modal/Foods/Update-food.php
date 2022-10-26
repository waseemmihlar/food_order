<?php
ob_start();
?>
<?php session_start(); ?>
<?php include '../../main.php'; ?>
<?php include '../../../backend/config/dbconnect.php'; ?>
<?php
if (isset($_GET['id'])) {
    // get the id and other details
    $id = $_GET['id'];
    // create sql quey get all db data
    $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
    $res2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    // get All data
    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $old_image = $row2['image_name'];
    $old_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active = $row2['active'];
} else {
    header("Location: ../../AdmiUi/Foods.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container  rounded-3 position-absolute top-50 start-50 translate-middle shadow p-3 mb-5 bg-body rounded" style="padding: 30px 60px 30px 50px;">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Update Food</h1>
                <!-- Alert Message -->
                <?php

                if (isset($_SESSION['upload_er'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['upload_er']; ?>
                    </div>
                <?php
                    unset($_SESSION['upload_er']); // When refresh the webpage this alert is disrepair
                }
                ?>

                <?php

                if (isset($_SESSION['upload_food_img'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['upload_food_img']; ?>
                    </div>
                <?php
                    unset($_SESSION['upload_food_img']); // When refresh the webpage this alert is disrepair
                }
                ?>

                <?php

                if (isset($_SESSION['add_er'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['add_er']; ?>
                    </div>
                <?php
                    unset($_SESSION['add_er']); // When refresh the webpage this alert is disrepair
                }
                ?>

                <!--End  Alert Message -->
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <!-- Left Side  -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3 mt-4">
                        <input type="text" name="title" class="form-control" value="<?php echo  $title; ?>" placeholder="Food Title Goes Here.">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" placeholder="Description of the Food" rows="5" cols="40"><?php echo $description; ?> </textarea>
                    </div>

                    <div class="input-group mb-3 mt-4">
                        <input type="number" name="price" class="form-control" placeholder="Price Of the Food" value="<?php echo $price ?>">
                    </div>

                    <!-- Image add-->
                    <!-- Current Image -->
                    <div class="row">
                        <div class="col-12">
                            <p>Current Image:</p>
                            <?php
                            if ($old_image != "") {
                                // display the image
                            ?>
                                <img src="../../../images/Food/<?php echo $old_image; ?>" alt="<?php echo $title ?>" width="200px;">
                            <?php
                            } else {
                                // display message
                                $_SESSION['img_avaliable'] = "image not Added....!";
                            }
                            ?>
                        </div>

                    </div>
                    <!-- End Current Image -->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Select New Image:</label>
                        <input type="file" class="form-control" name="image" id="formFile">
                    </div>
                    <!-- Image add End -->

                    <!-- Select section -->
                    <select class="form-select" name="category">
                        <?php
                        $sql = "SELECT * FROM category WHERE active ='Yes' ";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                // get the cat
                                $category_title = $row['title'];
                                $category_id = $row['id'];
                        ?>
                                <option <?php if ($old_category == $category_id) {
                                            echo "selected";
                                        } ?> value="<?php echo $category_id; ?>"><?php echo  $category_title; ?></option>
                            <?php
                            }
                        } else {
                            ?>
                            <option value="0">Category Not Available.</option>
                        <?php
                        }
                        ?>


                        <option value="0">Test Category</option>
                    </select>

                    <!-- End Select section -->

                    <!-- Radio Buttons -->

                    <!-- Featured -->
                    <p class="text-center">Featured:</p>
                    <div class="form-check" style="position: relative; left:47%;">
                        <input <?php if ($featured == "Yes") {
                                    echo "checked";
                                } ?> type="radio" class="form-check-input" type="radio" name="featured" value="Yes">Yes
                    </div>

                    <div class="form-check" style="position: relative; left:47%;">
                        <input <?php if ($featured == "No") {
                                    echo "checked";
                                } ?> type="radio" class="form-check-input" type="radio" name="featured" value="No">No
                    </div>

                    <!-- Active -->
                    <p class="text-center mt-3">Active:</p>
                    <div class="form-check" style="position: relative; left:47%;">
                        <input <?php if ($active == "Yes") {
                                    echo "checked";
                                } ?> type="radio" class="form-check-input" type="radio" name="active" value="Yes">Yes
                    </div>

                    <div class="form-check" style="position: relative; left:47%;">
                        <input <?php if ($active == "No") {
                                    echo "checked";
                                } ?> type="radio" class="form-check-input" type="radio" name="active" value="No">No
                    </div>

                    <!-- Button -->
                    <div class="d-grid gap-2 col-6 mx-auto mt-4">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="old_image" value="<?php echo  $old_image; ?>">
                        <input type="submit" name="submit" class="btn btn-outline-success" value="Update Food">

                    </div>
                </form>
                <?php
                // check wether button is clicked  or not 
                if (isset($_POST['submit'])) {
                    // Add the food in db
                    // get the data from form 
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $old_image = $_POST['image_name'];
                    $category = $_POST['category'];

                    // check whether radio btn for featured and active are checked or not
                    if (isset($_POST['featured'])) {
                        $featured = $_POST['featured'];
                    } else {
                        $featured = "No";  //setting the default value
                    }
                    if (isset($_POST['active'])) {
                        $active = $_POST['active'];
                    } else {
                        $active = "No";
                    }
                    // upload img is selected
                    // check whether the select image is clicked or not and upload the image only if the image is selected
                    if (isset($_FILES['image']['name'])) {

                        // get the details of the selected img
                        $image_name = $_FILES['image']['name'];

                        // check whether the image is selected or not and upload image only if selected
                        if ($image_name != "") {
                            // image is selected
                            // rename the image 

                            // get the extension selected image(jpg, png, gif,etc.) "pic.jpg"
                            $tmp = (explode('.', $image_name));
                            $ext = end($tmp);

                            // Create new name for image
                            $image_name = "Food-Name-" . rand(0000, 9999) . "." . $ext; //New image Name May Be "Food-Name-2222.jpg"

                            // upload the image
                            // get the src path and destination path
                            // Source path is the current location of the img
                            $src_path = $_FILES['image']['tmp_name'];

                            // destination path for the image to be upload
                            $dst_path = "../../../images/Food/" . $image_name;

                            // finally upload the food image
                            $upload = move_uploaded_file($src_path,  $dst_path);

                            // check whether image upload of not
                            if ($upload == false) {
                                // failed upload image
                                // redirect to add food page error message
                                $_SESSION['upload_food_img'] = "Failed to upload new image";
                                header("Location: add-food.php");
                                // ob_end_flush();
                                // stop the process
                                die();
                            }
                            // remove Current image if available
                            if ($old_image != "") {
                                // current image is available
                                // remove image
                                $remove_path = "../../../images/Food/" . $old_image;
                                $remove = unlink($remove_path);

                                // check whether the image is removed
                                if ($remove == false) {
                                    $_SESSION['remove_faild'] = "Faild to remove current Image.";
                                    // redirect
                                    header("Location: ../../AdmiUi/Foods.php");
                                    // stop
                                    die();
                                }
                            }
                        } else {
                            $image_name = $old_image;
                        }
                    } else {
                        $image_name = $old_image; //Setting default value as blank
                    }
                    // insert into db
                    // create SQL query to save or Add food

                    // for numerical value do not need to pass value inside quota But For string value string value it is compulsory to add

                    $sql3 = "UPDATE `tbl_food` SET `title`='$title',`description`='$description',`price`='$price',`image_name`='$image_name',`category_id`='$category',`featured`='$featured',`active`='$active' WHERE id=$id";

                    $res3 = mysqli_query($con, $sql3);
                    // check whether data add or not
                    if ($res3 == true) {
                        // data insert successfully 
                        $_SESSION['update'] = "Food Added Successfully...!";
                        header("Location: ../../AdmiUi/Foods.php");
                    } else {
                        // failed to insert
                        $_SESSION['add_er'] = "Failed to add foods....";
                        header("Location: ./add-food.php");
                        ob_end_flush();
                    }
                    // redirect with Message to manage food page
                }

                ?>


            </div>
            <div class="col-6">
                <img src="../../../images/addfoodimg.gif" alt="" width="400px">
            </div>
        </div>

    </div>
</body>

</html>