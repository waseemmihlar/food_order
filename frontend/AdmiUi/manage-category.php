<?php session_start() ?>
<?php include '../../backend/config/dbconnect.php'; ?>
<?php include '../main.php'; ?>
<?php include './AdminSideNav.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="Stylesheet" href="../style/manageCat.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">E-hungry CATEGORY</h1>
            </div>
        </div><!--  End Title-->

        <!-- Alert Success -->
        <div class="row">
            <div class="col-12">

                <?php
                if (isset($_SESSION['add'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['add']; ?>
                    </div>
                <?php
                    unset($_SESSION['add']); // When refresh the webpage this alert is disrepair
                }
                ?>

                <?php
                if (isset($_SESSION['img_error'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['img_error']; ?>
                    </div>
                <?php
                    unset($_SESSION['img_error']); // When refresh the webpage this alert is disrepair
                }
                ?>

                <?php
                if (isset($_SESSION['remove'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['remove']; ?>
                    </div>
                <?php
                    unset($_SESSION['remove']); // When refresh the webpage this alert is disrepair
                }
                ?>

                <?php
                if (isset($_SESSION['deleted'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['deleted']; ?>
                    </div>
                <?php
                    unset($_SESSION['deleted']); // When refresh the webpage this alert is disrepair
                }
                ?>

                <?php
                if (isset($_SESSION['uperr'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['uperr']; ?>
                    </div>
                <?php
                    unset($_SESSION['uperr']); // When refresh the webpage this alert is disrepair
                }
                ?>
                <?php
                if (isset($_SESSION['update'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['update']; ?>
                    </div>
                <?php
                    unset($_SESSION['update']); // When refresh the webpage this alert is disrepair
                }
                ?>
                <?php
                if (isset($_SESSION['update_er'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['update_er']; ?>
                    </div>
                <?php
                    unset($_SESSION['update_er']); // When refresh the webpage this alert is disrepair
                }
                ?>
                <?php
                if (isset($_SESSION['upload'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['upload']; ?>
                    </div>
                <?php
                    unset($_SESSION['upload']); // When refresh the webpage this alert is disrepair
                }
                ?>

                <!-- END Alert Success -->
            </div>
        </div>


        <div class=" row shadow p-3 mb-5 bg-body rounded count_orders text-center">
            <div class="col-4">
                <i class="fa fa-cube fa-2x mt-1" aria-hidden="true"></i>
            </div>
            <?php
            $order_count = "SELECT COUNT('category') AS cat FROM `category`";
            $order_res = mysqli_query($con, $order_count);
            $count_row = mysqli_fetch_assoc($order_res);
            $count = $count_row['cat'];
          
            ?>
            <div class="col-5">
                <h5 class="mt-2">CATEGORIES</h5>
            </div>
            <div class="col-3 mt-1">
                <H3><?php   echo $count;?></H3>
            </div>
        </div>
        <!-- Add Button Section -->
        <div class="row">
            <div class="col-12">
                <a href="../Modal/add-category.php" class="btn btn-success" role="button">Add new Category</a>
            </div>
        </div>
        <div class="row table">
            <div class="col-12">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">FEATURED</th>
                            <th scope="col">ACTIVE</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <?php
                    // Query to get all catogery from databases
                    $sql = "SELECT * FROM  category WHERE 1";
                    // execute
                    $res = mysqli_query($con, $sql);

                    // Count rows
                    $count = mysqli_num_rows($res);

                    // Check wether we have data in db or not
                    $sn = 1;
                    if ($count > 0) {
                        // Have data
                        while ($row = mysqli_fetch_assoc(($res))) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                    ?>

                            <tr>
                                <td class="table-success"><?php echo $sn++; ?>.</td>
                                <td class="table-success"><?php echo  $title ?></td>
                                <td class="table-success">
                                    <?php
                                    // check wether image name is available or not
                                    if ($image_name != "") {
                                        // display image
                                    ?>
                                        <img src="../../images/category/<?php echo $image_name; ?>" width="100px">
                                    <?php
                                    } else {
                                        // display message
                                        $_SESSION['img_error'] = "image not added";
                                    }
                                    ?>
                                </td>
                                <td class="table-success"><?php echo $featured ?></td>
                                <td class="table-success"><?php echo $active ?></td>
                                <td class="table-success"><a href="../Modal/Update-category.php?id=<?php echo $id; ?>" class="btn btn-primary" role="button">Update Category</a></td>
                                <td class=""><a href="../Modal/DeleteCategory.php?id=<?php echo $id; ?> &image_name=<?php echo $image_name; ?>" class="btn btn-danger" role="button">Delete Category</td>
                            </tr>

                        <?php
                        }
                    } else {
                        // We do not add data
                        // get data 
                        ?>
                        <tr>
                            <td colspan="6">
                                <div class="error">No category Added..</div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>