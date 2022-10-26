<?php
ob_start();
?>

<?php
session_start();
include '../main.php';
//  echo "This is Update section";
include '../../backend/config/dbconnect.php';
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
    <div class="container position-absolute top-50 start-50 translate-middle" style="width: 50%;">
        <div class="row border border-secondary">
            <div class="row mt-4">
                <div class="col-12">
                    <h3 class="text-center">UPDATE CATEGORY SECTION</h3>
                </div>
                <!-- Form Section -->
                <?php
                // check the id set or not
                if (isset($_GET['id'])) {
                    // get the id and other details
                    $id = $_GET['id'];

                    // create sql quey get all db data
                    $sql = "SELECT `title`,`image_name`,`featured`,`active` FROM category WHERE id=$id";
                    $res = mysqli_query($con, $sql);

                    // count the row
                    $count = mysqli_num_rows($res);
                    if ($count == 1) {
                        // get All data
                        $row = mysqli_fetch_assoc($res);
                        $title = $row['title'];
                        $old_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    } else {
                        // redirect mange cat page with session message
                        $_SESSION['uperr'] = "Category not Found";
                        header("Location: ../AdmiUi/manage-category.php");
                    }
                } else {
                    // redirect to manage cat page
                    header("Location: ../AdmiUi/manage-category.php");
                }
                ?>


                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- style="padding: 10px 40px 50px 40px;-->
                    <div class="input-group mb-3 mt-4">
                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo  $title; ?>">
                    </div>
                    <!-- Current Image -->
                    <div class="row">
                        <div class="col-12">
                            <p>Current Image:</p>
                            <?php
                            if ($old_name != "") {
                                // display the image
                            ?>
                                <img src="../../images/category/<?php echo $old_name; ?>" width="300px;">
                            <?php
                            } else {
                                // display message
                                $_SESSION['img_avaliable'] = "image not Added....!";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- End Current Image -->

                    <!-- Image add-->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Select Image:</label>
                        <input type="file" class="form-control" name="image" id="formFile" ">
                    </div>
                    <!-- Image add End -->

                    <!-- Radio Buttons -->
                    <p class=" text-center">Featured:</p>
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
                        <div class="d-grid gap-2 col-6 mx-auto mt-4">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="old_name" value="<?php echo $old_name; ?>">
                            <input type="submit" name="submit" value="Save Data" class="btn btn-outline-success">
                        </div>
                        <!--End Radio Buttons -->
                </form><!-- Add catogery form end -->
                <?php
                if (isset($_POST['submit'])) {
                    // get all the values from our form
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $old_name = $_POST['old_name'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    // updating new image if selected
                    // check wether the img is selected or not
                    if (isset($_FILES['image']['name'])) {
                        // get the img details
                        $image_name = $_FILES['image']['name'];
                        // check the image is available or not
                        if ($image_name != "") {
                            // image Available
                            // upload new image 
                            // Auto rename

                            // get extension of our image (jpg,png,gif,etc)e.g"special.food.png"
                            $ext = end(explode('.', $image_name));
                            // Rename image name
                            $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext;   //e.g Food_Category_343.jpg


                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path = "../../images/category/" . $image_name;

                            // upload image
                            $upload = move_uploaded_file($source_path, $destination_path);

                            // Check image is uploaded or not
                            if ($upload == false) {
                                // set message
                                $_SESSION['upload'] = "Faild to upload Image";
                                // redirect catogery page
                                header('Location: ../AdmiUi/manage-category.php');
                                die();
                            }



                            // remove current img
                            if ($old_name != "") {
                                $remove_path = '../../images/category/' . $old_name;
                                $remove = unlink($remove_path);
                                // check weather the image is removed or not
                                // if failed to remove then display message and stop the process 
                                if ($remove == false) {
                                    // Failed to remove image
                                    $_SESSION['faild-remove'] = "Failed to remove current Image";
                                    header("Location: ../AdmiUi/manage-category.php");
                                    die();
                                }
                            }
                        } else {
                            $image_name = $old_name;
                        }
                    } else {
                        $image_name = $old_name;
                    }


                    // update the db
                    $sql2 = "UPDATE category SET title='$title',image_name='$image_name',featured='$featured',active='$active' WHERE id=$id";

                    // executing query
                    $res2 = mysqli_query($con, $sql2);
                   

                    // redirect to mange category with message
                    // check execute or not
                    if ($res2 == true) {
                        // category updated
                        $_SESSION['update'] = "Category updated Successfully.";
                        header("Location: ../AdmiUi/manage-category.php");
                    } else {
                        // faild to update category
                        $_SESSION['update_er'] = "Category failed to added.";
                        header("Location: ../AdmiUi/manage-category.php");
                        ob_end_flush();
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>