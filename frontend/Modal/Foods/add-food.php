<?php session_start(); ?>
<?php
ob_start();
?>

<?php include '../../main.php'; ?>
<?php include '../../../backend/config/dbconnect.php'; ?>

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
                <h1 class="text-center">Add Food</h1>
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
      

                <!--End  Alert Message -->
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <!-- Left Side  -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3 mt-4">
                        <input type="text" name="title" class="form-control" placeholder="Title Of the food">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" placeholder="Description of the Food" rows="5" cols="40"></textarea>
                    </div>

                    <div class="input-group mb-3 mt-4">
                        <input type="number" name="price" class="form-control" placeholder="Price Of the Food">
                    </div>

                    <!-- Image add-->
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Select Image:</label>
                        <input type="file" class="form-control" name="image" id="formFile">
                    </div>
                    <!-- Image add End -->

                    <!-- Select section -->
                    <select class="form-select" name="category">

                        <?php
                        // create php code to display category from db
                        //Create sql to get all active category from db
                        $sql = "SELECT * FROM category WHERE active ='Yes' ";
                        $res = mysqli_query($con, $sql);

                        // count rows to chech wether we have category or not
                        $count = mysqli_num_rows($res);

                        // if count greater than Zero,we have category else we dont have cat
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                // get the cat
                                $id = $row['id'];
                                $title = $row['title'];
                        ?>
                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                            <?php
                            }
                        } else {
                            ?>
                            <option value="0">No category Found</option>
                        <?php
                        }

                        // display dropdown
                        ?>
                    </select>
                    <!-- End Select section -->

                    <!-- Radio Buttons -->

                    <!-- Featured -->
                    <p class="text-center">Featured:</p>
                    <div class="form-check" style="position: relative; left:47%;">
                        <input type="radio" class="form-check-input" type="radio" name="featured" value="Yes">Yes
                    </div>

                    <div class="form-check" style="position: relative; left:47%;">
                        <input type="radio" class="form-check-input" type="radio" name="featured" value="No">No
                    </div>

                    <!-- Active -->
                    <p class="text-center mt-3">Active:</p>
                    <div class="form-check" style="position: relative; left:47%;">
                        <input type="radio" class="form-check-input" type="radio" name="active" value="Yes">Yes
                    </div>

                    <div class="form-check" style="position: relative; left:47%;">
                        <input type="radio" class="form-check-input" type="radio" name="active" value="No">No
                    </div>

                    <!-- Button -->
                    <div class="d-grid gap-2 col-6 mx-auto mt-4">
                        <input type="submit" name="submit" class="btn btn-outline-success" value="Add Food">

                    </div>
                </form>
                <?php
                // check wether button is clicked  or not 
                if (isset($_POST['submit'])) {
                    // Add the food in db
                    // get the data from form 
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];
                    echo $title;
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
                            $src = $_FILES['image']['tmp_name'];

                            // destination path for the image to be upload
                            $dst = "../../../images/Food/" . $image_name;

                            // finally upload the food image
                            $upload = move_uploaded_file($src, $dst);

                            // check whether image upload of not
                            if ($upload == false) {
                                // failed upload image
                                // redirect to add food page error message
                                $_SESSION['upload_er'] = "Failed to upload image";
                                header("Location: add-food.php");
                                // ob_end_flush();
                                // stop the process
                                die();
                            }
                        }
                    } else {
                        $image_name = ""; //Setting default value as blank
                    }
                    // insert into db
                    // create SQL query to save or Add food

                    // for numerical value do not need to pass value inside quota But For string value string value it is compulsory to add
                    $sql2 = "INSERT INTO tbl_food(title,description,price,image_name,category_id,featured,active) 
                    VALUES ('$title','$description',$price,'$image_name',$category,'$featured','$active')";

                    $res2 = mysqli_query($con, $sql2);
                    // check whether data add or not
                    if ($res2 == true) {
                        // data insert successfully 
                        $_SESSION['add'] = "Food Added Successfully";
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