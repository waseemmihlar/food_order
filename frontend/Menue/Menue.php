<?php require_once '../main.php' ?>
<?php include '../../backend/config/dbconnect.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head></head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="../style/Menue.css">
</head>

<body>

    <div class="container Card">
        <div class="row">
            <div class="col-12">
                <H1 class="text-center">Menu Section</H1>
            </div>

            <?php
            // Create sql query to display category from db
            $sql = "SELECT * FROM category WHERE active='Yes' AND featured ='Yes' LIMIT 3";
            $res = mysqli_query($con, $sql);

            $count = mysqli_num_rows($res);
            if ($count > 0) {
                // Category available
                while ($row = mysqli_fetch_assoc($res)) {
                    // get the value like id,title,image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
            ?>
                    <div class="card-group" style="width: 22rem;">
                        <div class="col">

                            <?php
                            // Check whether Image is available or not
                            if ($image_name == "") {
                                // Display Message
                                $_SESSION['img_empty'] = "Image Not Available,";
                            } else {
                                // image available
                            ?>
                                <div class="card h-100">
                                    <img src="../../images/category/<?php echo $image_name ?>" class="card-img-top">
                                <?php
                            }
                                ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $title ?></h5>
                                </div>
                                </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                // Not available
                $_SESSION['cat_no'] = "Category Not Added...!";
            }
            ?>
        </div>
    </div>
</body>