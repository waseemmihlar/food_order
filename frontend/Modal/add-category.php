<?php session_start() ?>
<?php
ob_start();
?>

<?php include '../../backend/config/dbconnect.php'; ?>
<?php include '../main.php'; ?>

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
                    <h3 class="text-center">ADD NEW CATEGORY SECTION</h3>
                </div>
            </div>
            <!-- Alert set section -->
            <?php
            if (isset($_SESSION['err'])) {
            ?>
                <div class="alert-danger" role="alert">
                    <strong>Hey!</strong> <?= $_SESSION['err']; ?>

                </div>
            <?php
                unset($_SESSION['err']); // When refresh the webpage this alert is disrepair
            }
            ?>

            <?php
            if (isset($_SESSION['upload'])) {
            ?>
                <div class="alert-danger" role="alert">
                    <strong>Hey!</strong> <?= $_SESSION['upload']; ?>
                </div>
            <?php
                unset($_SESSION['upload']); // When refresh the webpage this alert is disrepair
            }
            ?>
            <!-- END Alert set section -->

            <!-- Form Section -->
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- style="padding: 10px 40px 50px 40px;-->
                <div class="input-group mb-3 mt-4">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <!-- Image add-->
                <div class="mb-3">
                    <label for="formFile" class="form-label">Select Image:</label>
                    <input type="file" class="form-control" name="image" id="formFile">
                </div>
                <!-- Image add End -->

                <!-- Radio Buttons -->
                <p class="text-center">Featured:</p>
                <div class="form-check" style="position: relative; left:47%;">
                    <input type="radio" class="form-check-input" type="radio" name="featured" value="Yes">Yes
                </div>
                <div class="form-check" style="position: relative; left:47%;">
                    <input type="radio" class="form-check-input" type="radio" name="featured" value="No">No
                </div>

                <p class="text-center mt-3">Active:</p>
                <div class="form-check" style="position: relative; left:47%;">
                    <input type="radio" class="form-check-input" type="radio" name="active" value="Yes">Yes
                </div>
                <div class="form-check" style="position: relative; left:47%;">
                    <input type="radio" class="form-check-input" type="radio" name="active" value="No">No
                </div>
                <div class="d-grid gap-2 col-6 mx-auto mt-4">
                    <input type="submit" name="submit" class="btn btn-outline-success" value="Add Category">
                </div>
                <!--End Radio Buttons -->
            </form><!-- Add catogery form end -->


            <?php
            // Submit button is clicked or not
            if (isset($_POST['submit'])) {
                // get the value cat form
                $title = $_POST['title'];

                // for check radio btn check or not
                if (isset($_POST['featured'])) {
                    // get the value from form
                    $featured = $_POST['featured'];
                } else {
                    $featured = "No";
                }

                if (isset($_POST['active'])) {
                    $active = $_POST['active'];
                } else {
                    $active = "No";
                }
                // Check the image is selected or not and the value for image name accordingly
                // print_r($_FILES['image']);
                // die();
                if (isset($_FILES['image']['name'])) {
                    // upload img
                    // need image name,source path and destination path
                    $image_name = $_FILES['image']['name'];

                    // upload image only if img is selected
                    if ($image_name != "") {
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
                            header('Location: add-category.php');
                            die();
                        }
                    }
                } else {
                    // dont up img
                    $image_name = "";
                }


                // INSERT data in mysql
                $sql = "INSERT INTO category(`title`, `image_name`, `featured`, `active`) 
                VALUES ('$title','$image_name','$featured','$active')";

                // Execute the query in db
                $res = mysqli_query($con, $sql);

                // check Variable is execute or not
                if ($res == true) {
                    // query add
                    $_SESSION['add'] = "category Added Successfully";
                    // redirect manage category

                    header('Location: ../AdmiUi/manage-category.php');
                    ob_end_flush();
                    // include '';
                } else {
                    // failed add category
                    $_SESSION['err'] = "failed to add category";
                    // redirect manage category
                    header('Location: add-category.php');
                }
            }
            ?>
        </div>
    </div>
</body>

</html>