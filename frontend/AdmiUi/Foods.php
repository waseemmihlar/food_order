<?php session_start(); ?>
<?php include './AdminSideNav.php'; ?>
<?php include '../../backend/config/dbconnect.php'; ?>
<?php include '../main.php'; ?>


<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">E-hungry Foods Sections</h1>
            </div>
        </div>

        <div class="row shadow p-3 mb-5 bg-body rounded count_orders text-center">
            <div class="col-4">
                <i class="fa fa-cube fa-2x mt-1" aria-hidden="true"></i>
            </div>
            <?php
            $sql = "SELECT COUNT(`title`) AS foo FROM `tbl_food` ";
            $res = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($res);
            $count = $row['foo'];
          

            ?>
            <div class="col-5">
                <h5 class="mt-2">Foods</h5>
            </div>
            <div class="col-3 mt-1">
                <H3>
                    <?php   echo $count;?>
                </H3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-end">
                <a href="../Modal/Foods/add-food.php" class="btn btn-outline-success">Add Food</a>
            </div>
        </div>
        <!-- Alert  -->

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
        if (isset($_SESSION['deleted_food'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <strong>Hey!</strong> <?= $_SESSION['deleted_food']; ?>
            </div>
        <?php
            unset($_SESSION['deleted_food']); // When refresh the webpage this alert is disrepair
        }
        ?>

        <?php
        if (isset($_SESSION['remove_food'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <strong>Hey!</strong> <?= $_SESSION['remove_food']; ?>
            </div>
        <?php
            unset($_SESSION['remove_food']); // When refresh the webpage this alert is disrepair
        }
        ?>

        <?php
        if (isset($_SESSION['deleted_food'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <strong>Hey!</strong> <?= $_SESSION['deleted_food']; ?>
            </div>
        <?php
            unset($_SESSION['deleted_food']); // When refresh the webpage this alert is disrepair
        }
        ?>
        <?php
        if (isset($_SESSION['deleted_food_error'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <strong>Hey!</strong> <?= $_SESSION['deleted_food_error']; ?>
            </div>
        <?php
            unset($_SESSION['deleted_food_error']); // When refresh the webpage this alert is disrepair
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

        <!-- End Alert  -->
        <div class="row table">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col ">Featured</th>
                            <th scope="col ">Active</th>
                        </tr>
                        <?php
                        $sql = "SELECT *FROM tbl_food";
                        $res = mysqli_query($con, $sql);

                        // Count Rows to check whether we have foods or not 
                        $count = mysqli_num_rows($res);
                        $sn = 1;
                        if ($count > 0) {
                            // we have food in db
                            // get the food from db and display
                            while ($row = mysqli_fetch_assoc($res)) {  
                                // get the value from individual column
                                $id = $row['id'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                        ?>
                    <tbody>
                        <tr>

                            <td class="table-success "><?php echo $sn++; ?></td>
                            </td>
                            <td class="table-success "> <?php echo $title; ?></td>
                            <td class="table-success "> <?php echo $description; ?></td>
                            <td class="table-success ">Rs. <?php echo $price; ?></td>
                            <td class="table-success ">
                                <?php
                                // check whether we have image or not
                                if ($image_name == "") {
                                    // We do not have image,display error message
                                    echo "<p style='color:red';>Image Not Added.</p>";
                                } else {
                                    // We have image Display image
                                ?>
                                    <img src="../../images/Food/<?php echo $image_name; ?>" width="100px;">
                                <?php
                                }
                                ?>
                            </td>
                            <td class="table-success "> <?php echo $featured; ?></td>
                            <td class="table-success "><?php echo $active; ?> </td>
                            <td class="table-success "><a href="../Modal/Foods/Update-food.php?id=<?php echo $id; ?>" class="btn btn-success">Update Food</td>
                            <td class="table-success"><a href=" ../Modal/Foods/Delete-food.php?id=<?php echo $id ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete Food</a></td>
                        </tr>
                    </tbody>
            <?php
                            }
                        } else {
                            // food not add in db
                            echo "<tr><td colspan='7' style='color:red'>Food Not added Yet.</td></tr>";
                        }
            ?>
            </thead>


                </table>
            </div>
        </div>
    </div>
</body>

</html>